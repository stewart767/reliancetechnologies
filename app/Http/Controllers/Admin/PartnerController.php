<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('sort_order')->get();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|file|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'website' => 'nullable|url',
            'sort_order' => 'integer',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('partners', 'public');
            $validated['logo'] = $path;
        }

        Partner::create($validated);

        return redirect()->route('admin.partners.index')->with('success', 'Partner created successfully.');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'website' => 'nullable|url',
            'sort_order' => 'integer',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('logo')) {
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }
            $path = $request->file('logo')->store('partners', 'public');
            $validated['logo'] = $path;
        }

        $partner->update($validated);

        return redirect()->route('admin.partners.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy(Partner $partner)
    {
        if ($partner->logo) {
            Storage::disk('public')->delete($partner->logo);
        }
        
        $partner->delete();

        return redirect()->route('admin.partners.index')->with('success', 'Partner deleted successfully.');
    }
}
