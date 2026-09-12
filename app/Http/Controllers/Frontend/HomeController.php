<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Solution;
use App\Models\Industry;
use App\Models\Project;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Partner;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     */
    public function index()
    {
        $services = Cache::remember('global_services', 86400, function () {
            return Service::where('is_active', true)->orderBy('sort_order')->get();
        });

        $solutions = Cache::remember('global_solutions', 86400, function () {
            return Solution::where('is_active', true)->orderBy('sort_order')->get();
        });

        $industries = Cache::remember('global_industries', 86400, function () {
            return Industry::where('is_active', true)->orderBy('sort_order')->get();
        });

        $projects = Cache::remember('home_projects', 86400, function () {
            return Project::where('is_published', true)
                ->where('is_featured', true)
                ->with('industry')
                ->orderBy('created_at', 'asc')
                ->get();
        });

        $posts = Cache::remember('home_posts', 86400, function () {
            return Post::where('is_published', true)
                ->with('category')
                ->orderBy('published_at', 'desc')
                ->take(3)
                ->get();
        });

        $testimonials = Cache::remember('home_testimonials', 86400, function () {
            return Testimonial::where('is_active', true)
                ->orderBy('sort_order')
                ->get();
        });

        $partners = Cache::remember('home_partners', 86400, function () {
            return Partner::where('is_active', true)
                ->orderBy('sort_order')
                ->get();
        });

        $sliders = Cache::remember('home_sliders', 86400, function () {
            return Slider::where('is_active', true)->orderBy('sort_order')->get();
        });

        $softwareProducts = Cache::remember('home_software_products', 86400, function () {
            return Product::where('type', 'software')
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->get();
        });

        return view('frontend.home.index', compact('services', 'solutions', 'industries', 'projects', 'posts', 'testimonials', 'partners', 'sliders', 'softwareProducts'));
    }

    /**
     * Generate dynamic XML sitemap.
     */
    public function sitemap()
    {
        $services = Cache::remember('global_services', 86400, function () {
            return Service::where('is_active', true)->orderBy('sort_order')->get();
        });

        $solutions = Cache::remember('global_solutions', 86400, function () {
            return Solution::where('is_active', true)->orderBy('sort_order')->get();
        });

        $industries = Cache::remember('global_industries', 86400, function () {
            return Industry::where('is_active', true)->orderBy('sort_order')->get();
        });

        $projects = Cache::remember('all_published_projects', 86400, function () {
            return Project::where('is_published', true)->with('industry')->get();
        });

        $posts = Cache::remember('all_published_posts', 86400, function () {
            return Post::where('is_published', true)->with('category')->orderBy('published_at', 'desc')->get();
        });

        $content = view('frontend.sitemap', compact('services', 'solutions', 'industries', 'projects', 'posts'))->render();
        return response($content)->header('Content-Type', 'text/xml');
    }
}
