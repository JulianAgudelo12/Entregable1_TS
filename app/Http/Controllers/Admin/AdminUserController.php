<?php

/* Developed by Valeria Corrales Hoyos */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utilities\UserHelper;
use App\Utilities\UserValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('admin.user.index_title');
        $viewData['subtitle'] = __('admin.user.index_subtitle');

        $viewData['users'] = User::all();
        $viewData['totalUsers'] = User::all()->count();

        return view('admin.user.index')->with('viewData', $viewData);
    }

    public function destroy(string $id): RedirectResponse
    {
        User::destroy($id);

        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully!');
    }

    public function edit(string $id): View
    {
        $user = User::findOrFail($id);

        $viewData = [];
        $viewData['title'] = 'Edit User';
        $viewData['user'] = $user;

        return view('admin.user.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        UserValidator::validate($request->all());

        $user = User::findOrFail($id);
        UserHelper::fillUserData($user, $request);
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'User Updated successfully!');
    }
}
