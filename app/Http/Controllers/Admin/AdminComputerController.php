<?php
/* Developed by Valeria Corrales Hoyos*/

namespace App\Http\Controllers\Admin;

use App\Models\Computer;
use App\Utilities\ComputerValidator;
use App\Http\Controllers\Controller;
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

        return view('admin.computer.index')->with('viewData', $viewData);
    }

    public function delete(string $id): RedirectResponse
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

    public function save(Request $request): RedirectResponse
    {
        ComputerValidator::validate($request);

        $newComputer = new Computer;
        $newComputer->setReference($request->input('reference'));
        $newComputer->setName($request->input('name'));
        $newComputer->setBrand($request->input('brand'));
        $newComputer->setQuantity($request->input('quantity'));
        $newComputer->setType($request->input('type'));
        $newComputer->setDescription($request->input('description'));
        $newComputer->setPrice($request->input('price'));
        $newComputer->save();

        return redirect()->route('admin.computer.index')->with('success', 'Computer created successfully!');

    }
}
