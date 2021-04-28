<?php


namespace Core;


final class Route
{
    static public $routes = [];
    static public $routeParams = [];
    public $request;
    public $view;

    public function __construct($request = [])
    {
        // Подключаем сами роуты созданные пользователем
        require_once APP_DIR . "/routes/api.php";
        require_once APP_DIR . "/routes/web.php";

        $this->request = $request;
        if($this->request){
            $this->start();
        }
    }

    public static function get($path, $call) // Метод GET
    {
        stripos($path, '{') ? self::$routeParams[] = $path : '';
        self::$routes['get'][$path] = $call;
        return new self;
    }

    public static function post($path, $call) // Метод POST
    {
        stripos($path, '{') ? self::$routeParams[] = $path : '';
        self::$routes['post'][$path] = $call;
    }

    public static function match($methods, $path, $call) // Комбинация МЕТОДОВ
    {
        stripos($path, '{') ? self::$routeParams[] = $path : '';
        stripos($path, '{') ? self::$routeParams[] = $path : '';
        foreach ($methods as $method) {
            self::$routes[$method][$path] = $call;
        }
    }

    public function start() // Вызываем текущий контроллер
    {
        $current_method = $this->request->method();
        $current_path = $this->request->path();

        $args = [$this->request];

        $this->checkParams($current_path, $args);

        $callback = self::$routes[$current_method][$current_path];

        if(is_array($callback)) {
            $callback[0] = new $callback[0]();
        }
        echo call_user_func_array($callback, $args);
    }

    private function checkParams(&$currentPath, &$args) {
        $expCurrentPath = explode('/', $currentPath);
        array_shift($expCurrentPath);


        for($i = 0; $i < count(self::$routeParams); $i++) {
            $checker = [];
            $route = explode('/', self::$routeParams[$i]);
            array_shift($route);
            
            $ones = array_diff($route, $expCurrentPath);
            $twoes = array_diff($expCurrentPath, $route);
            foreach ($ones as $key => $value) {
                if (array_key_exists($key, $twoes) && count($twoes) === count($ones) && stripos($value, '{') !== false) {
                    $checker[] = [$value => [self::$routeParams[$i], $twoes[$key]]] ;
                }
            }
            if(count($checker) === count($ones)) {
                foreach($checker[0] as $key => $value) {
                    $currentPath = $value[0];
                    $args[] = $value[1];
                }
            }

        }
    }

}
