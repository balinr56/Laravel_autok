<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request)
{
    $kereses = $request->query('kereses');

    $brands = Brand::with('models')
        ->when($kereses, function ($query, $kereses) {
            $query->where('name', 'like', "%{$kereses}%")
                  ->orWhereHas('models', function ($q) use ($kereses) {
                      $q->where('name', 'like', "%{$kereses}%");
                  });
        })
        ->get();

    return view('brands.index', compact('brands', 'kereses'));
}

    public function create()
    {
        return view('brands.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Brand::create($validated);

        return redirect()
            ->route('brands.index')
            ->with('status', 'Márka létrehozva!');
    }

    public function show(Brand $brand)
    {
        return view('brands.show', compact('brand'));
    }

    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $brand->update($validated);

        return redirect()
            ->route('brands.index')
            ->with('status', 'Márka frissítve!');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()
            ->route('brands.index')
            ->with('status', 'Márka törölve!');
    }
}