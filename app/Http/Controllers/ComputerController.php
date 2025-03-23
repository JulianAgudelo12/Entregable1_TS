<?php
/* Developed by Valeria Corrales Hoyos*/

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ComputerController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Computer - Online Store';
        $viewData['subtitle'] = 'List of computers';
        $viewData['computers'] = Computer::all();

        return view('computer.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];
        $computer = Computer::findOrFail($id);
        $viewData['title'] = $computer->getName();
        $viewData['subtitle'] = $computer->getName().' - General information';
        $viewData['computer'] = $computer;

        return view('computer.index')->with('viewData', $viewData);
    }
}
