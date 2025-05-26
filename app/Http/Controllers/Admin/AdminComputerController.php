<?php

/* Developed by Valeria Corrales Hoyos */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use App\Utilities\ComputerFilter;
use App\Utilities\ComputerHelper;
use App\Utilities\ComputerValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminComputerController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = __('admin.computer.title');
        $viewData['subtitle'] = __('admin.computer.subtitle');
        $viewData['computers'] = Computer::all();

        $viewData['filtercomputers'] = ComputerFilter::apply($request)->get();

        return view('admin.computer.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $computer = Computer::findOrFail($id);
        $viewData['title'] = $computer->getName();
        $viewData['subtitle'] = $computer->getName().' - General information';
        $viewData['computer'] = $computer;

        return view('admin.computer.show')->with('viewData', $viewData);
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

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('computers', 'public');
            $newComputer->imagen_path = $imagePath;
        }

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

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($computer->imagen_path) {
                Storage::delete('public/'.$computer->imagen_path);
            }
            $imagePath = $request->file('image')->store('computers', 'public');
            $computer->imagen_path = $imagePath;
        }

        $computer->save();

        return redirect()->route('admin.computer.index')->with('success', 'Computer Updated successfully!');
    }

    public function destroy(string $id): RedirectResponse
    {
        $computer = Computer::findOrFail($id);

        if ($computer->imagen_path) {
            Storage::delete('public/'.$computer->imagen_path);
        }

        Computer::destroy($id);

        return redirect()->route('admin.computer.index')->with('success', 'Computer deleted successfully!');
    }
}
