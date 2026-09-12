<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects.
     */
    public function index()
    {
        $projects = \Illuminate\Support\Facades\Cache::remember('projects_index', 86400, function () {
            return Project::where('is_published', true)
                ->with('industry')
                ->orderBy('published_at', 'desc')
                ->get();
        });

        $industries = \Illuminate\Support\Facades\Cache::remember('global_industries', 86400, function () {
            return \App\Models\Industry::where('is_active', true)->orderBy('sort_order')->get();
        });

        return view('frontend.projects.index', compact('projects', 'industries'));
    }

    /**
     * Display the specified project.
     */
    public function show(Project $project)
    {
        if (!$project->is_published) {
            abort(404);
        }

        $relatedProjects = Project::where('is_published', true)
            ->where('id', '!=', $project->id)
            ->take(3)
            ->get();

        return view('frontend.projects.show', compact('project', 'relatedProjects'));
    }
}
