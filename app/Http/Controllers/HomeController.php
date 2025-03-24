<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Home Page - Onlne Store';
        $viewData['subtitle'] = 'Home Page';

        return view('home.index')->with('viewData', $viewData);
    }
}
