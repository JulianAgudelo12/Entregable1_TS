<?php

/* Developed by Valeria Corrales Hoyos */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use App\Utilities\ComputerHelper;
use App\Utilities\ComputerValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminComputerController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Admin - Manage Computer';
        $viewData['subtitle'] = 'Manage Computers';
        $viewData['computers'] = Computer::all();

        return view('admin.computer.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];
        $computer = Computer::findOrFail($id);
        $viewData['title'] = $computer->getName();
        $viewData['subtitle'] = $computer->getName().' - General information';
        $viewData['computer'] = $computer;

        return view('admin.computer.show')->with('viewData', $viewData);
    }

    public function destroy(string $id): RedirectResponse
    {
        Computer::destroy($id);

        return redirect()->route('admin.computer.index')->with('success', 'Computer deleted successfully!');
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create Computer';

        return view('admin.computer.create')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        ComputerValidator::validate($request);

        $newComputer = new Computer;
        ComputerHelper::fillComputerData($newComputer, $request);
        $newComputer->save();

        return redirect()->route('admin.computer.index')->with('success', 'Computer created successfully!');
    }

    public function edit(string $id): View
    {
        $computer = Computer::findOrFail($id); 

        $viewData = [];
        $viewData['title'] = 'Edit Computer';
        $viewData['computer'] = $computer;

        return view('admin.computer.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        ComputerValidator::validate($request);

        $computer = Computer::findOrFail($id);
        ComputerHelper::fillComputerData($computer, $request);
        $computer->save();

        return redirect()->route('admin.computer.index')->with('success', 'Computer Updated successfully!');
    }
}
