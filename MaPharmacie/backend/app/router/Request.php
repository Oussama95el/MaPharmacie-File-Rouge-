<?php

namespace App\router;

class Request
{
    static private array $attributes = [];

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
        function parseFormBody(): array
        {
            $body = array();
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
            return $body;
        }

        function parseJSONBody()
        {
            $input = file_get_contents("php://input");
            $body = json_decode($input, true);

            if (is_null($body)) {
                foreach (explode("&", $input) as $value) {
                    $explosion = explode("=", $value);

                    [$key, $val] = $explosion;
                    $body[$key] = $val;
                }
            }
            return $body;
        }

        $body = parseFormBody();
        if (count($body) == 0) {
            $body = parseJSONBody();
        }
        return $body;

    }

}