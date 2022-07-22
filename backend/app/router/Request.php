<?php

namespace App\router;

class Request
{
    static private array $attributes = [];
    // handle body requests and attributes requests
    static public function get($key): string|null
    {
        return self::$attributes[$key] ?? null;
    }

    public static function set(string $key, mixed $val)
    {
        self::$attributes[$key] = $val;
    }

    public static function remove(string $key)
    {
        unset(self::$attributes[$key]);
    }

    public static function add(array $data = [])
    {
        self::$attributes = [...self::$attributes, ...$data];
    }

    public static function getBody()
    {
        // get the body of the request
        function parseFormBody(): array
        {
            $body = array();
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
            return $body;
        }
        // parse body request if it s json data
        function parseJSONBody()
        {
            $input = file_get_contents("php://input",);
            $body = json_decode($input, true);
            // handle if json is not valid
            if (is_null($body)) {
                foreach (explode("&", $input) as $value) {
                    $explosion = explode("=", $value); // explode the key and value of the body

                    [$key, $val] = $explosion;
                    $body[$key] = $val;
                }
            }
            return $body;
        }
        // handle body request if it s form data
        $body = parseFormBody();
        if (count($body) == 0) {
            $body = parseJSONBody();
        }
        return $body;
    }
    // handle attributes requests
    public static function queryString($key)
    {
        return $_GET[$key] ?? null;
    }

}