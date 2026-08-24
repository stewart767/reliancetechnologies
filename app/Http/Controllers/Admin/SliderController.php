<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('sort_order')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'background_image' => 'required|image|max:2048',
            'primary_cta_text' => 'nullable|string|max:255',
            'primary_cta_url' => 'nullable|string|max:255',
            'secondary_cta_text' => 'nullable|string|max:255',
            'secondary_cta_url' => 'nullable|string|max:255',
            'sort_order' => 'integer',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('background_image')) {
            $path = $request->file('background_image')->store('sliders', 'public');
            $validated['background_image'] = $path;
        }

        Slider::create($validated);

        return redirect()->route('admin.sliders.index')->with('success', 'Slide created successfully.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'background_image' => 'nullable|image|max:2048',
            'primary_cta_text' => 'nullable|string|max:255',
            'primary_cta_url' => 'nullable|string|max:255',
            'secondary_cta_text' => 'nullable|string|max:255',
            'secondary_cta_url' => 'nullable|string|max:255',
            'sort_order' => 'integer',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('background_image')) {
            // Delete old background image from storage if it exists and is not a default/static image asset path
            if ($slider->background_image && !str_starts_with($slider->background_image, 'images/')) {
                Storage::disk('public')->delete($slider->background_image);
            }
            $path = $request->file('background_image')->store('sliders', 'public');
            $validated['background_image'] = $path;
        }

        $slider->update($validated);

        return redirect()->route('admin.sliders.index')->with('success', 'Slide updated successfully.');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->background_image && !str_starts_with($slider->background_image, 'images/')) {
            Storage::disk('public')->delete($slider->background_image);
        }

        $slider->delete();

        return redirect()->route('admin.sliders.index')->with('success', 'Slide deleted successfully.');
    }
}
