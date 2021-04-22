<?php


namespace Core;


class Hash
{
    public static function make($el)
    {
        return password_hash($el, PASSWORD_DEFAULT);
    }

    public static function check($password, $hashPassword)
    {
        return password_verify($password, $hashPassword);
    }
}