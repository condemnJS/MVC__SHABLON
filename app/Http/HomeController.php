<?php

namespace App\Http;

use Core\Controller;

class HomeController extends Controller
{
    public function index() {
        return view('home');
    }
}