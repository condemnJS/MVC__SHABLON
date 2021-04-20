<?php


namespace Core;


class Route
{
    static public $routes = [];
    public $request;
    public $view;

    public function __construct($request)
    {
        // Подключаем сами роуты созданные пользователем
        require_once APP_DIR . "/routes/api.php";
        require_once APP_DIR . "/routes/web.php";

        $this->request = $request;
        $this->start();
    }

    public static function get($path, $call) // Метод GET
    {
        self::$routes['get'][$path] = $call;
    }

    public static function post($path, $call) // Метод POST
    {
        self::$routes['post'][$path] = $call;
    }

    public static function match($methods, $path, $call) // Комбинация МЕТОДОВ
    {
        foreach ($methods as $method) {
            self::$routes[$method][$path] = $call;
        }
    }

    public function start() // Вызываем текущий контроллер
    {
        $current_method = $this->request->method();
        $current_path = $this->request->path();
        echo call_user_func(self::$routes[$current_method][$current_path], $this->request);
    }
}