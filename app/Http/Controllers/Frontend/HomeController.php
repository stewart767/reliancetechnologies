<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Solution;
use App\Models\Industry;
use App\Models\Project;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     */
    public function index()
    {
        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $solutions = Solution::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $industries = Industry::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $projects = Project::where('is_published', true)
            ->where('is_featured', true)
            ->with('industry')
            ->orderBy('created_at', 'asc')
            ->get();

        $posts = Post::where('is_published', true)
            ->with('category')
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        $testimonials = \App\Models\Testimonial::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $partners = \App\Models\Partner::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $sliders = \Schema::hasTable('sliders')
            ? \App\Models\Slider::where('is_active', true)->orderBy('sort_order')->get()
            : collect();

        return view('frontend.home.index', compact('services', 'solutions', 'industries', 'projects', 'posts', 'testimonials', 'partners', 'sliders'));
    }

    /**
     * Generate dynamic XML sitemap.
     */
    public function sitemap()
    {
        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $solutions = Solution::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $industries = Industry::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $projects = Project::where('is_published', true)
            ->with('industry')
            ->get();

        $posts = Post::where('is_published', true)
            ->with('category')
            ->orderBy('published_at', 'desc')
            ->get();

        $content = view('frontend.sitemap', compact('services', 'solutions', 'industries', 'projects', 'posts'))->render();
        return response($content)->header('Content-Type', 'text/xml');
    }
}
