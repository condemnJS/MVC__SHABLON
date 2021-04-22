<?php


namespace Core;


class Request
{
    public function method() // Получаем текущий метод
    {
        return mb_strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function path() // Получаем текущий url *(без GET параметров)
    {
        $path = $_SERVER['REQUEST_URI'] ? $_SERVER['REQUEST_URI'] : '/';
        $position = strpos($_SERVER['REQUEST_URI'], '?');
        if (!$position) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    private function body()
    {
        $body = [];
        if ($this->method() === 'get') {
            foreach ($_GET as $key => $item) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->method() === 'post') {
            foreach ($_POST as $key => $item) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }

    public function all()
    {
        return $this->body();
    }

    public function __get($name)
    {
        if(array_key_exists($name, $_POST)) {
            return $this->body()[$name];
        }
    }
}