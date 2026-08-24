<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::orderBy('sort_order')->get();
        return view('admin.industries.index', compact('industries'));
    }

    public function create()
    {
        return view('admin.industries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:industries,slug',
            'challenge' => 'required|string',
            'opportunity' => 'required|string',
            'solution_desc' => 'required|string',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $validated['slug'] = $validated['slug'] ?: Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');

        Industry::create($validated);

        return redirect()->route('admin.industries.index')->with('success', 'Industry sector created successfully.');
    }

    public function edit(Industry $industry)
    {
        return view('admin.industries.edit', compact('industry'));
    }

    public function update(Request $request, Industry $industry)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:industries,slug,' . $industry->id,
            'challenge' => 'required|string',
            'opportunity' => 'required|string',
            'solution_desc' => 'required|string',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $industry->update($validated);

        return redirect()->route('admin.industries.index')->with('success', 'Industry sector updated successfully.');
    }

    public function destroy(Industry $industry)
    {
        $industry->delete();
        return redirect()->route('admin.industries.index')->with('success', 'Industry sector deleted successfully.');
    }
}
