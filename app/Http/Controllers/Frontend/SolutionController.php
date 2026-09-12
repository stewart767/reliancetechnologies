<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Solution;

class SolutionController extends Controller
{
    /**
     * Display a listing of solutions.
     */
    public function index()
    {
        $solutions = \Illuminate\Support\Facades\Cache::remember('global_solutions', 86400, function () {
            return Solution::where('is_active', true)
                ->orderBy('sort_order')
                ->get();
        });

        return view('frontend.solutions.index', compact('solutions'));
    }

    /**
     * Display the specified solution.
     */
    public function show(Solution $solution)
    {
        if (!$solution->is_active) {
            abort(404);
        }

        $relatedSolutions = Solution::where('is_active', true)
            ->where('id', '!=', $solution->id)
            ->take(3)
            ->get();

        // Map solutions to projects
        $projectSlugs = match($solution->slug) {
            'digital-transformation' => ['ajira-market', 'employee-reference-bureau'],
            'smart-business-systems' => ['smart-sale', 'peak-hr-solutions'],
            'secure-infrastructure' => ['employee-reference-bureau', 'team-track'],
            'intelligent-automation' => ['team-track', 'peak-hr-solutions'],
            'enterprise-integration' => ['yao-yao-energies', 'smart-sale'],
            default => [],
        };

        $projects = \App\Models\Project::whereIn('slug', $projectSlugs)
            ->where('is_published', true)
            ->with('industry')
            ->get();

        return view('frontend.solutions.show', compact('solution', 'relatedSolutions', 'projects'));
    }
}
