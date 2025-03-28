<?php

/* Developed by Valeria Corrales Hoyos */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Models\Computer;
use App\Models\User;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $viewData = [];

        $viewData['totalUsers'] = User::count();
        $viewData['totalComputers'] = Computer::count();
        $viewData['totalComponents'] = Component::count();

        return view('admin.dashboard.index')->with('viewData', $viewData);
    }
}
