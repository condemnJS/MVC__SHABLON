<?php


namespace App\Http;

use Core\Controller;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
    }
}