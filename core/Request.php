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

    public function only($params) {
        $arr = [];
        foreach ($params as $param) {
            $arr[$param] = $this->body()[$param];
        }
        return $arr;
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
        foreach ($_FILES as $key => $item) {
            $body[$key] = $item['name'];
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

    public function file(string $filename) {
        return $_FILES[$filename];
    }
}