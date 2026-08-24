<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('industry')->orderBy('created_at', 'desc')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $industries = Industry::where('is_active', true)->get();
        return view('admin.projects.create', compact('industries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug',
            'industry_id' => 'required|exists:industries,id',
            'client_name' => 'nullable|string|max:255',
            'challenge' => 'required|string',
            'solution' => 'required|string',
            'technology' => 'required|string',
            'results' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $validated['slug'] = $validated['slug'] ?: Str::slug($validated['title']);
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_published'] = $request->has('is_published');
        $validated['published_at'] = $validated['is_published'] ? (($validated['published_at'] ?? null) ?: now()) : null;

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('projects', 'public');
            $validated['featured_image'] = $path;
        }

        $project = Project::create($validated);

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $path = $image->store('projects/gallery', 'public');
                $project->gallery()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $industries = Industry::where('is_active', true)->get();
        // Load gallery relation
        $project->load('gallery');
        return view('admin.projects.edit', compact('project', 'industries'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:projects,slug,' . $project->id,
            'industry_id' => 'required|exists:industries,id',
            'client_name' => 'nullable|string|max:255',
            'challenge' => 'required|string',
            'solution' => 'required|string',
            'technology' => 'required|string',
            'results' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_published'] = $request->has('is_published');
        $validated['published_at'] = $validated['is_published'] ? (($validated['published_at'] ?? null) ?: ($project->published_at ?: now())) : null;

        if ($request->hasFile('featured_image')) {
            if ($project->featured_image) {
                Storage::disk('public')->delete($project->featured_image);
            }
            $path = $request->file('featured_image')->store('projects', 'public');
            $validated['featured_image'] = $path;
        }

        $project->update($validated);

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $path = $image->store('projects/gallery', 'public');
                $project->gallery()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        if ($project->featured_image) {
            Storage::disk('public')->delete($project->featured_image);
        }

        // Delete all gallery images
        foreach ($project->gallery as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }

    public function deleteImage(Project $project, \App\Models\ProjectImage $image)
    {
        if ($image->project_id === $project->id) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
            return redirect()->back()->with('success', 'Gallery image deleted successfully.');
        }
        return redirect()->back()->with('error', 'Unauthorized action.');
    }
}
