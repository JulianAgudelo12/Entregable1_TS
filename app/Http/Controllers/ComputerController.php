<?php

/* Developed by Valeria Corrales Hoyos */

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Wishlist;
use App\Utilities\ComputerFilter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ComputerController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = 'Computer - Online Store';
        $viewData['subtitle'] = 'List of computers';
        $viewData['computers'] = Computer::all();

        $viewData['computers'] = ComputerFilter::apply($request)->paginate(9);

        return view('computer.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $computer = Computer::findOrFail($id);
        $viewData['title'] = $computer->getName();
        $viewData['subtitle'] = $computer->getName().' - General information';
        $viewData['computer'] = $computer;

        return view('computer.show')->with('viewData', $viewData);
    }

    public function compare(Request $request): View|RedirectResponse
    {
        $viewData = [];
        $viewData['title'] = 'Compare Computers';
        $viewData['subtitle'] = 'Comparison of selected computers';

        $computerIds = $request->input('computers', []);

        if (count($computerIds) < 2) {
            return redirect()->route('computer.index')->with('error', 'Select at least two computers.');
        }

        $viewData['computers'] = Computer::whereIn('id', $computerIds)->get();

        return view('computer.compare')->with('viewData', $viewData);
    }
}
