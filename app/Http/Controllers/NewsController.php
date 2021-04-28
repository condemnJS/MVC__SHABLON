<?php


namespace App\Http\Controllers;

use App\Http\Models\Portfolio;
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

    public function destroy(Request $request, $id) {
        $news = News::find($id);
        News::delete($news);
        return redirect('/admin/news');
    }

    public function edit(Request $request, $id) {

        $news = News::find($id);

        if($request->method() === 'post') {
            Validator::make($request->all(), [
                'title' => 'required',
                'description' => 'required',
            ])->validate();

            if($request->all()['image']) {
                $image = Storage::move('news', $request->file('image'));
                $refactorRequests = array_merge($request->only(['title', 'description']), ['image' => $image]);
                News::update($news, $refactorRequests);
            } else {
                News::update($news, $request->only(['title', 'description']));
            }
            return back()->with(['message' => 'Новость успешно обновлена']);

        }

        return view('admin/news/newsEdit', ['news' => $news]);
    }
}