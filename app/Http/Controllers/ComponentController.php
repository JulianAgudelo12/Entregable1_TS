<?php

/* Developed by Julian Agudelo */

namespace App\Http\Controllers;

use App\Models\Component;
use Illuminate\View\View;

class ComponentController extends Controller
{
    public function index(): View
    {
        $components = Component::all();
        $viewData = [];
        $viewData['title'] = __('component.title');
        $viewData['subtitle'] = __('component.subtitle');
        $viewData['components'] = $components;

        return view('component.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $component = Component::findOrFail($id);
        $viewData['title'] = __('component.title_show');
        $viewData['subtitle'] = __('component.subtitle_show');
        $viewData['component'] = $component;

        return view('component.show')->with('viewData', $viewData);
    }
}
