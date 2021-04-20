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
        if(!$position) {
            return $path;
        }
        return substr($path, 0, $position);
    }
}