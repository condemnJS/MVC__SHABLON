<?php

namespace App\Http\Controllers;

use App\Http\Models\News;
use Core\Controller;

class HomeController extends Controller
{
    public function index() {
        $news = News::all();
        return view('home', compact('news'));
    }
}