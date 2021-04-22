<?php


namespace App\Http;

use Core\Controller;
use Core\Request;
use Core\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if($request->method() === 'post') {

        }
        return view('login');
    }

    public function register()
    {
        return view('register');
    }
}