<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\YaoyaoSpec;
use Illuminate\Http\Request;

class YaoyaoSpecController extends Controller
{
    public function index()
    {
        $specs = YaoyaoSpec::orderBy('group')->orderBy('sort_order')->get();
        return view('admin.yaoyao_specs.index', compact('specs'));
    }

    public function create()
    {
        return view('admin.yaoyao_specs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'group' => 'required|string|max:255',
            'key' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'sort_order' => 'integer',
        ]);

        YaoyaoSpec::create($validated);

        return redirect()->route('admin.yaoyao-specs.index')->with('success', 'Specification created successfully.');
    }

    public function edit(YaoyaoSpec $yaoyaoSpec)
    {
        return view('admin.yaoyao_specs.edit', compact('yaoyaoSpec'));
    }

    public function update(Request $request, YaoyaoSpec $yaoyaoSpec)
    {
        $validated = $request->validate([
            'group' => 'required|string|max:255',
            'key' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'sort_order' => 'integer',
        ]);

        $yaoyaoSpec->update($validated);

        return redirect()->route('admin.yaoyao-specs.index')->with('success', 'Specification updated successfully.');
    }

    public function destroy(YaoyaoSpec $yaoyaoSpec)
    {
        $yaoyaoSpec->delete();
        return redirect()->route('admin.yaoyao-specs.index')->with('success', 'Specification deleted successfully.');
    }
}
