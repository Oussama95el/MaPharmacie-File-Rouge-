<?php

namespace App\router;


/**
 * @method static  get(string $uri, array|string|callable|null $action = null)
 * @method static  post(string $uri, array|string|callable|null $action = null)
 * @method static  patch(string $uri, array|string|callable|null $action = null)
 * @method static  put(string $uri, array|string|callable|null $action = null)
 * @method static  delete(string $uri, array|string|callable|null $action = null)
 */
class Route
{
    static public array $routesMap = [];
    static private array $classInstances = [];


    public static function __callStatic(string $methodName, array $arguments) //
    {
        if (count($arguments) < 2) {
//            simple error handler for missing arguments
            echo json_encode([
                "Error" => "cannot setup a '$methodName' handler without specifying a path and handler",
                "stack_trace" => debug_backtrace()
            ]);
            die();
        }

        list($uri, $method) = $arguments;


        $url = self::formatURL($uri);

        $handler = self::createHandler($method, $url);

        self::$routesMap[strtolower($methodName)][$handler->regexURI] = &$handler;
        if (!$handler->isDynamic) { // example of dynamic route /posts/{id}
            self::$routesMap[strtolower($methodName)][$handler->uri] = &$handler;
        }


        return $handler;
    }
    // format url to remove
    private static function formatURL($url): string
    {
        $str = rtrim($url, "/");
        return $str === "" ? "/" : $str;
    }


    private static function createHandler($resolver, $url): object // create a handler object
    {
        $handler = null;
        // if the resolver is a string, it's a class name
        if (is_array($resolver)) {
            $className = $resolver[0] ?? null;
            $classInstance = self::getClassInstance($className);
            $handler = self::getClassMethod($classInstance, $resolver[1] ?? DEFAULT_HANDLER);

        }
        // if theres no class name in the resolver
        if (!$handler && is_string($resolver)) {
            $classInstance = self::getClassInstance($resolver);
            $handler = self::getClassMethod($classInstance, DEFAULT_HANDLER);
        }

        $handler ??= $resolver;

        $regexifyURI = self::regexifyURI($url);
        // return a handler object
        return (object) [
            "resolver" => $handler,
            "uri" => $url,
            "regexURI" => $regexifyURI["uri"],
            "isDynamic" => $regexifyURI["isDynamic"]
        ];

    }
    // get class instance from class name and store it in a static array
    private static function getClassInstance($className)
    {
        $obj = self::$classInstances[$className] ?? null;
        if (!$obj && class_exists($className)) {
            $obj = new $className();
            self::$classInstances[$className] = $obj;
        }
        if (!$obj) {
            die("could not instantiate $className doesnt exist.");
        }

        return $obj;

    }

    private static function getClassMethod($instance, $methodName) // get the method from the class
    {
        if (!method_exists($instance, $methodName)) {
            die("$methodName doesnt exist on class '".$instance::class."'");
        }
        return [$instance, $methodName];
    }
    // handle route parameter and make them dynamic
    static private function regexifyURI(string $uri): array
    {
        $pattern = preg_replace_callback("/{(\w+)}/", function ($match) {
            $paramName = $match[1];
            return "(?P<$paramName>\w+)";
        }, $uri);
        return ["isDynamic" => $pattern !== $uri, "uri" => str_replace("/", "\/", $pattern)];
    }

    private static function cors()
    {
        // Function that handles  CORS
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400');
        }

// Access-Control headers are received during OPTIONS requests
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) // may also be using PUT, PATCH, HEAD etc
            {
                header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
            }

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
                header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
            }

            exit(0);
        }
    }

    // handle requests  and resolve them
    public static function handleRequest()
    {
        self::cors();
        $handler = self::getHandler();
        if (!$handler) {
            echo json_encode(["message" => "Resource not found"]);
            header("status: 404");
            return;
        }
        $resolver = $handler->resolver;
        if (is_array($resolver)) {
            list($obj, $method) = $resolver;
            return $obj->$method();
        }
        return call_user_func($resolver);
    }
    // get handler for request
    public static function getHandler()
    {
        $method = strtolower($_SERVER["REQUEST_METHOD"]);
        $methodRoutesMap = self::$routesMap[$method] ?? null;

        $handler = null;
        if ($methodRoutesMap) {
            $path = str_replace(ROOT, "", $_SERVER["REDIRECT_URL"]); // remove root from path
            $path = self::formatURL($path);
            $handler = $methodRoutesMap[$path] ?? null;
            if ($handler) {
                return $handler;
            }
            foreach ($methodRoutesMap as $regexURI => $value) { // check if request uri is dynamic
                if (!$value->isDynamic) {
                    continue;
                }
                preg_match("/^$regexURI$/", $path, $matches);  // preg_match returns array of matches
                if (count($matches) !== 0) {
                    Request::add(array_slice($matches, 1));
                    $handler = $value;
                    break;
                }
            }
        }
        return $handler;
    }
    // json encode and return response
    public static function json($data): bool
    {
        echo json_encode($data);
        return true;
    }
}


