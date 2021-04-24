<?php


namespace App\Http\Controllers;

use Core\Controller;
use Core\Request;
use Core\Hash;
use Core\DB;
use App\Http\Models\User;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if($request->method() === 'post') {
            User::create([
                'id' => 3,
                'fio' => 'Гизатулин Султан Камильевич',
                'email' => 'tatar@mail.ru',
                'password' => 'asd228'
            ]);
        }
        return view('login');
    }

    public function register()
    {
        return view('register');
    }
}