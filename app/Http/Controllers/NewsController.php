<?php


namespace App\Http\Controllers;

use Core\Controller;
use Core\Facades\Storage;
use Core\Request;
use Core\Validator;
use App\Http\Models\News;
use Core\Auth;

class NewsController extends Controller
{
    public function index(){
        return view('news');
    }

    public function create(Request $request) {
        if($request->method() === 'post') {
            Validator::make($request->all(), [
                'title' => 'required',
                'description' => 'required',
                'image' => 'required'
            ])->validate();
            $image = Storage::move('news', $request->file('image'));
            News::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $image,
                'user_id' => Auth::user()['id']
            ]);
            return back()->with(['message' => 'Новость успешно создан']);
        }
        return view('admin/news/newsCreate');
    }

    public function indexAdmin() {
        $news = News::all();
        return view('admin/news/newsIndex', ['news' => $news]);
    }
}