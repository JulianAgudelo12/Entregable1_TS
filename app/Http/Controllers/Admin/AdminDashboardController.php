<?php

/* Developed by Valeria Corrales Hoyos */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Admin Dashboard';
        $viewData['subtitle'] = 'Dashboard';

        $viewData['totalUsers'] = User::count();

        return view('admin.dashboard.index')->with('viewData', $viewData);
    }
}
