<?php

namespace App\Http\Controllers;

use App\Models\Models;
use App\Models\Brand;
use Illuminate\Http\Request;

class ModelsController extends Controller
{
    public function index()
    {
        $models = Models::with('brand')->get();

        return view('models.index', compact('models'));
    }

    public function create()
    {
        $brands = Brand::all();

        return view('models.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'brand_id' => ['required', 'exists:brands,id'],
        ]);

        Models::create($validated);

        return redirect()
            ->route('models.index')
            ->with('status', 'Autómodell létrehozva!');
    }

    public function show(Models $model)
    {
        return view('models.show', compact('model'));
    }

    public function edit(Models $model)
    {
        $brands = Brand::all();

        return view('models.edit', compact('model', 'brands'));
    }

    public function update(Request $request, Models $model)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'brand_id' => ['required', 'exists:brands,id'],
        ]);

        $model->update($validated);

        return redirect()
            ->route('models.index')
            ->with('status', 'Autómodell frissítve!');
    }

    public function destroy(Models $model)
    {
        $model->delete();

        return redirect()
            ->route('models.index')
            ->with('status', 'Autómodell törölve!');
    }
}
