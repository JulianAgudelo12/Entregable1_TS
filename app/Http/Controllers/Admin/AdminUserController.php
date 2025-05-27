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
        $viewData['title'] = __('user.admin_panel');
        $viewData['subtitle'] = __('user.admin_panel');

        $viewData['users'] = User::all();
        $viewData['totalUsers'] = User::all()->count();

        return view('admin.user.index')->with('viewData', $viewData);
    }

    public function destroy(string $id): RedirectResponse
    {
        User::destroy($id);

        return redirect()->route('admin.user.index')->with('success', __('user.deleted'));
    }

    public function edit(string $id): View
    {
        $user = User::findOrFail($id);

        $viewData = [];
        $viewData['title'] = __('user.update_title');
        $viewData['user'] = $user;

        return view('admin.user.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        UserValidator::validate($request->all());

        $user = User::findOrFail($id);
        UserHelper::fillUserData($user, $request);
        $user->save();

        return redirect()->route('admin.user.index')->with('success', __('user.updated'));
    }
}
