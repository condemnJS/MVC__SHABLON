<?php

namespace App\Http\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index() {
        return view('home');
    }
}