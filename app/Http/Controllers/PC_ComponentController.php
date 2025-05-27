<?php

/* Developed by Julian Agudelo */

namespace App\Http\Controllers;

use App\Models\PC_Component;
use App\Utilities\PC_ComponentHelper;
use Illuminate\View\View;

class PC_ComponentController extends Controller
{
    public function index(): View
    {
        $viewData = [];

        $viewData["title"] = __('pc_component.title');
        $viewData["subtitle"] = __('pc_component.subtitle');
        $viewData["pc_components"] = PC_Component::all();

        return view('pc_component.index', $viewData)->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $pc_component = PC_Component::findOrFail($id);

        $viewData = [];
        
        $viewData['title'] = __('pc_component.title_show');
        $viewData['subtitle'] = __('pc_component.subtitle_show');
        $viewData['image'] = $pc_component->getImage();
        $viewData['name'] = $pc_component->getName();
        $viewData['attributes'] = PC_ComponentHelper::getAttributes($pc_component);

        return view('pc_component.show', $viewData)->with('viewData', $viewData);
    }
}
