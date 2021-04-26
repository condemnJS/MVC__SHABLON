<?php


namespace Core;


class Redirect
{
    public $is_back = false;

    static public function url(string $path) {
        header('Location: ' . $path);
        return new self;
    }

    public function currentHeader() {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); 
    }

    static public function back() {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        $object = new self;
        $object->is_back = true;
        return $object;
    }

    public function with(array $params){
        foreach ($params as $key => $value) {
            Session::set($key, $value);
        }
        if($this->is_back) {
            header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        }
    }
}