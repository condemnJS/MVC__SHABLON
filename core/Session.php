<?php 

namespace Core;

class Session {
    static public function has(string $session) {
        return isset($_SESSION[$session]);
    }

    static public function get(string $session) {
        if(isset($_SESSION[$session])) {
            return $_SESSION[$session];
        }
        return null;
    }

    static public function set(string $session, $value) {
        $_SESSION[$session] = $value;
    }

    static public function clear(string $key) {
        if(isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
}