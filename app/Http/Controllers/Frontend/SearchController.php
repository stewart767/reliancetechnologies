<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Solution;
use App\Models\Industry;
use App\Models\Project;
use App\Models\Post;

class SearchController extends Controller
{
    /**
     * Handle global website searches.
     */
    public function index(Request $request)
    {
        $query = trim($request->input('q', ''));
        $results = [];

        if (!empty($query)) {
            // Safe parameters search across entities
            $services = Service::where('is_active', true)
                ->where(function($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                      ->orWhere('short_description', 'like', "%{$query}%");
                })->get();

            $solutions = Solution::where('is_active', true)
                ->where(function($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                      ->orWhere('short_description', 'like', "%{$query}%");
                })->get();

            $industries = Industry::where('is_active', true)
                ->where(function($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                      ->orWhere('challenge', 'like', "%{$query}%");
                })->get();

            $projects = Project::where('is_published', true)
                ->where(function($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                      ->orWhere('challenge', 'like', "%{$query}%");
                })->get();

            $posts = Post::where('is_published', true)
                ->where(function($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                      ->orWhere('summary', 'like', "%{$query}%");
                })->get();

            // Group results logically
            $results = [
                'services' => $services,
                'solutions' => $solutions,
                'industries' => $industries,
                'projects' => $projects,
                'posts' => $posts,
            ];
        }

        return view('frontend.search.index', compact('results', 'query'));
    }
}
