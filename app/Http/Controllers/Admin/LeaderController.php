<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LeaderController extends Controller
{
    public function index()
    {
        $leaders = Leader::orderBy('sort_order')->get();
        return view('admin.leaders.index', compact('leaders'));
    }

    public function create()
    {
        return view('admin.leaders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'bio' => 'required|string',
            'experience_years' => 'required|integer',
            'location' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('leaders', 'public');
            $validated['avatar'] = $path;
        }

        Leader::create($validated);

        return redirect()->route('admin.leaders.index')->with('success', 'Leader created successfully.');
    }

    public function edit(Leader $leader)
    {
        return view('admin.leaders.edit', compact('leader'));
    }

    public function update(Request $request, Leader $leader)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'bio' => 'required|string',
            'experience_years' => 'required|integer',
            'location' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('avatar')) {
            if ($leader->avatar) {
                Storage::disk('public')->delete($leader->avatar);
            }
            $path = $request->file('avatar')->store('leaders', 'public');
            $validated['avatar'] = $path;
        }

        $leader->update($validated);

        return redirect()->route('admin.leaders.index')->with('success', 'Leader updated successfully.');
    }

    public function destroy(Leader $leader)
    {
        if ($leader->avatar) {
            Storage::disk('public')->delete($leader->avatar);
        }
        $leader->delete();

        return redirect()->route('admin.leaders.index')->with('success', 'Leader deleted successfully.');
    }
}
