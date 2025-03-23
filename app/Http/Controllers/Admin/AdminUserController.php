<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Admin - Manage Users';
        $viewData['subtitle'] = 'Manage Users';

        $viewData['users'] = User::all();
        $viewData['totalUsers'] = User::all()->count();

        return view('admin.user.index')->with('viewData', $viewData);
    }
}
