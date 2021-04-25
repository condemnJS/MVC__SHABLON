<?php


namespace App\Http\Controllers;

use Core\Controller;
use Core\Request;
use Core\Hash;
use Core\DB;
use App\Http\Models\User;
use Core\Session;
use Core\Validator;
use Core\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if($request->method() === 'post') {
            Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ])->validate();

            Auth::attempt($request->all());
        }
        return view('login');
    }

    public function register(Request $request)
    {
        if($request->method() === 'post') {
            Validator::make($request->all(), [
                'fio' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirm|min:6'
            ])->validate();
    
            User::create([
                'email' => $request->email,
                'fio' => $request->fio,
                'password' => Hash::make($request->password)
            ]);

            return redirect('login');
        }
        return view('register');
    }
}