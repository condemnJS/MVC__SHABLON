<?php 

namespace Core;

class Session {
    static public function has(string $session) {
        return isset($_SESSION[$session]);
    }

    static public function get(string $session) {
        return $_SESSION[$session];
    }

    static public function set(string $session, $value) {
        $_SESSION[$session] = $value;
    }
}