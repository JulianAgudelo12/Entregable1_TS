<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PC_Component;
use App\Utilities\PC_ComponentHelper;
use App\Utilities\PC_ComponentValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View; 
use Illuminate\Support\Str;

class AdminPC_ComponentController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('pc_component.title_index');
        $viewData['subtitle'] = __('pc_component.subtitle_index');
        $viewData['components'] = PC_Component::all();

        return view('admin.pc_component.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $component = PC_Component::findOrFail($id);
        $viewData['title'] = $component->getName();
        $viewData['subtitle'] = $component->getName().' - '.__('component.show_subtitle');
        $viewData['component'] = $component;

        return view('admin.pc_component.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('component.title');
        $viewData['subtitle'] = __('component.subtitle');

        return view('admin.pc_component.create')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        PC_ComponentValidator::validatePC_Component($request);
        
        $component = new PC_Component;
        PC_ComponentHelper::fillPC_ComponentData($component, $request);

        $image = $request->file('image');
        $filename = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME))
                  . '-' . time() . '.' . $image->extension();
        $path = $image->storeAs('components', $filename, 'public');

        $component->setImage($path);
        $component->save();

        return redirect() ->route('admin.pc_component.index') ->with('success', __('pc_component.success'));
    }
    

    public function edit(string $id): View
    {
        $component = PC_Component::findOrFail($id);

        $viewData = [];
        $viewData['title'] = __('pc_component.title');
        $viewData['subtitle'] = __('component.subtitle');
        $viewData['component'] = $component;

        return view('admin.pc_component.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        PC_ComponentValidator::validateUpdate($request);

        $component = PC_Component::findOrFail($id);
        PC_ComponentHelper::fillPC_ComponentData($component, $request);

        //  Handle image update
        if ($request->hasFile('image')) {
            //  Delete the old image if it exists
            if ($component->image_path) {
                Storage::delete('public/'.$component->image_path);
            }
            $imagePath = $request->file('image')->store('components', 'public');
            $component->image_path = $imagePath;
        }

        $component->save();

        return redirect()->route('admin.pc_component.index')->with('success', __('pc_component.success'));
    }

    public function destroy(string $id): RedirectResponse
    {
        $component = PC_Component::findOrFail($id);

        //  Delete the image if it exists
        if ($component->image_path) {
            Storage::delete('public/'.$component->image_path);
        }

        $component->delete();

        return redirect()->route('admin.pc_component.index')->with('success', __('pc_component.deleted'));
    }
        
}
