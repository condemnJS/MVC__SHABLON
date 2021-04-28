<?php


namespace App\Http\Controllers;


use App\Http\Models\Portfolio;
use Core\Controller;
use Core\Request;
use Core\Validator;

class PortfolioController extends Controller
{
    public function indexAdmin() {
        $portfolios = Portfolio::all();
        return view('admin/portfolios/portfolioIndex', ['portfolios' => $portfolios]);
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

    public function destroy(Request $request, $id) {
        $portfolio = Portfolio::find($id);
        Portfolio::delete($portfolio);
        return redirect('/admin/portfolios');
    }

    public function edit(Request $request, $id) {
        $portfolio = Portfolio::find($id);

        if($request->method() === 'post') {
            Validator::make($request->all(), [
                'year' => 'required',
                'description' => 'required',
                'site' => 'required'
            ])->validate();

            Portfolio::update($portfolio, $request->all());
            return back()->with(['message' => 'Портфолио успешно обновлено']);
        }

        return view('admin/portfolios/portfolioEdit', ['portfolio' => $portfolio]);
    }
}