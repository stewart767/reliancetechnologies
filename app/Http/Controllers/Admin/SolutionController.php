<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SolutionController extends Controller
{
    public function index()
    {
        $solutions = Solution::orderBy('sort_order')->get();
        return view('admin.solutions.index', compact('solutions'));
    }

    public function create()
    {
        return view('admin.solutions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:solutions,slug',
            'subtitle' => 'nullable|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'capabilities' => 'nullable|array',
            'capabilities.*' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $validated['slug'] = $validated['slug'] ?: Str::slug($validated['title']);
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');
        $validated['capabilities'] = $request->input('capabilities', []);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('solutions', 'public');
            $validated['image'] = $path;
        }

        Solution::create($validated);

        return redirect()->route('admin.solutions.index')->with('success', 'Solution created successfully.');
    }

    public function edit(Solution $solution)
    {
        return view('admin.solutions.edit', compact('solution'));
    }

    public function update(Request $request, Solution $solution)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:solutions,slug,' . $solution->id,
            'subtitle' => 'nullable|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'capabilities' => 'nullable|array',
            'capabilities.*' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');
        $validated['capabilities'] = $request->input('capabilities', []);

        if ($request->hasFile('image')) {
            if ($solution->image) {
                Storage::disk('public')->delete($solution->image);
            }
            $path = $request->file('image')->store('solutions', 'public');
            $validated['image'] = $path;
        }

        $solution->update($validated);

        return redirect()->route('admin.solutions.index')->with('success', 'Solution updated successfully.');
    }

    public function destroy(Solution $solution)
    {
        if ($solution->image) {
            Storage::disk('public')->delete($solution->image);
        }
        $solution->delete();

        return redirect()->route('admin.solutions.index')->with('success', 'Solution deleted successfully.');
    }
}
