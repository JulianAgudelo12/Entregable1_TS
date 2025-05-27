<?php

/* Developed by Valeria Corrales Hoyos */

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Utilities\ComputerDTO;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ComputerController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = __('computer.title');
        $viewData['subtitle'] = __('computer.list_title');
        $viewData['computers'] = Computer::all();

        // $viewData['computers'] = ComputerFilter::apply($request)->get();

        return view('computer.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $computer = Computer::findOrFail($id);

        $viewData = [];

        $viewData['title'] = __('computer.title');
        $viewData['subtitle'] = __('computer.detail_title');
        $viewData['image'] = $computer->getImage();
        $viewData['name'] = $computer->getName();
        $viewData['attributes'] = ComputerDTO::getAttributes($computer);

        return view('computer.show')->with('viewData', $viewData);
    }

    public function compare(Request $request): View|RedirectResponse
    {
        $viewData = [];
        $viewData['title'] = __('computer.title');
        $viewData['subtitle'] = __('computer.compare_title');

        $computerIds = $request->input('computers', []);

        if (count($computerIds) < 2) {
            return redirect()->route('computer.index')->with('error', __('computer.select_al_two'));
        }

        $computers = Computer::whereIn('id', $computerIds)->get();
        $viewData['computers'] = $computers;

        // Prepare comparison attributes
        $comparisonData = [
            ['label' => __('computer.brand'), 'values' => $computers->pluck('brand')->toArray()],
            ['label' => __('computer.type'), 'values' => $computers->pluck('type')->map(fn ($t) => ucfirst($t))->toArray()],
            ['label' => __('computer.description'), 'values' => $computers->pluck('description')->toArray()],
            ['label' => __('computer.price'), 'values' => $computers->pluck('price')->map(fn ($p) => '$'.number_format($p, 2))->toArray()],
        ];

        $viewData['comparisonData'] = $comparisonData;

        return view('computer.compare')->with('viewData', $viewData);
    }
}
