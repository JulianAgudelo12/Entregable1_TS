<?php

/* Developed by Valeria Corrales Hoyos */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use App\Utilities\ComputerDataBuilder;
use App\Utilities\ComputerFilter;
use App\Utilities\ComputerValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Str;

class AdminComputerController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = __('computer.admin_panel');
        $viewData['subtitle'] = __('computer.admin_panel');
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
        $viewData['title'] = __('admin.computer.create_title');
        $viewData['subtitle'] = __('admin.computer.create_subtitle');

        return view('admin.computer.create')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        ComputerValidator::validate($request);

        $computer = new Computer;
        ComputerDataBuilder::fillComputerData($computer, $request);

        // Image
        $image = $request->file('image');
        $filename = Str::slug(
                pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)
            ) . '-' . time() . '.' . $image->extension();

        $path = $image->storeAs('images', $filename, 'public');
        $computer->setImage($path);

        $computer->save();

        return redirect() ->route('admin.computer.index') ->with('success', __('admin.computer.created'));
    }


    public function edit(string $id): View
    {
        $computer = Computer::findOrFail($id);

        $viewData = [];
        $viewData['title'] = __('admin.computer.edit_title');
        $viewData['subtitle'] = __('admin.computer.edit_subtitle');
        $viewData['computer'] = $computer;

        return view('admin.computer.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        ComputerValidator::validateUpdate($request);

        $computer = Computer::findOrFail($id);
        ComputerDataBuilder::fillComputerData($computer, $request);

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
