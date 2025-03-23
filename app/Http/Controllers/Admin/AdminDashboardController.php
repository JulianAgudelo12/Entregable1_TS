<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

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