<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Admin - Manage Users';
        $viewData['subtitle'] = 'Manage Users';


        $viewData['users'] = User::all();
        $viewData['totalUsers'] = User::all()->count();

        return view('admin.users.index')->with('viewData', $viewData);
    }
    
}

