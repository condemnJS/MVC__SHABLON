<?php


namespace App\Http\Controllers;


use App\Http\Models\Portfolio;
use Core\Controller;
use Core\Request;
use Core\Validator;

class PortfolioController extends Controller
{
    public function indexAdmin() {
        return view('admin/portfolios/portfolioIndex');
    }

    public function create(Request $request) {
        if($request->method() === 'post') {
            Validator::make($request->all(), [
                'year' => 'required',
                'description' => 'required',
                'site' => 'required'
            ])->validate();

            Portfolio::create([
                'year' => $request->year,
                'description' => $request->description,
                'site' => $request->site
            ]);

            return back()->with(['message' => 'Запись успешно создана']);
        }
        return view('admin/portfolios/portfolioCreate');
    }
}