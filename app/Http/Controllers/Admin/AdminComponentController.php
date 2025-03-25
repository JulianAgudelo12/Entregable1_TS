<?php

/* Developed by Julian Agudelo */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Utilities\ComponentHelper;
use App\Utilities\ComponentValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminComponentController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('component.title_index');
        $viewData['subtitle'] = __('component.subtitle_index');
        $viewData['components'] = Component::all();

        return view('admin.component.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $component = Component::findOrFail($id);
        $viewData['title'] = $component->getName();
        $viewData['subtitle'] = $component->getName().' - '.__('component.show_subtitle');
        $viewData['component'] = $component;

        return view('admin.component.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('component.title');
        $viewData['subtitle'] = __('component.subtitle');

        return view('admin.component.create')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        ComponentValidator::validateComponent($request);

        $newComponent = new Component;
        ComponentHelper::fillComponentData($newComponent, $request);
        $newComponent->save();

        return redirect()->route('admin.component.index')->with('success', __('component.success'));
    }

    public function edit(string $id): View
    {
        $component = Component::findOrFail($id);

        $viewData = [];
        $viewData['title'] = __('component.title');
        $viewData['subtitle'] = __('component.subtitle');
        $viewData['component'] = $component;

        return view('admin.component.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        ComponentValidator::validateComponent($request);

        $component = Component::findOrFail($id);
        ComponentHelper::fillComponentData($component, $request);
        $component->save();

        return redirect()->route('admin.component.index')->with('success', __('component.success'));
    }

    public function destroy(string $id): RedirectResponse
    {
        $component = Component::findOrFail($id);
        $component->delete();

        return redirect()->route('admin.component.index')->with('success', __('component.deleted'));
    }
}
