<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\Service;

class IndustryController extends Controller
{
    /**
     * Display a listing of industries.
     */
    public function index()
    {
        $industries = \Illuminate\Support\Facades\Cache::remember('global_industries', 86400, function () {
            return Industry::where('is_active', true)
                ->orderBy('sort_order')
                ->get();
        });

        return view('frontend.industries.index', compact('industries'));
    }

    /**
     * Display the specified industry.
     */
    public function show(Industry $industry)
    {
        if (!$industry->is_active) {
            abort(404);
        }

        // Fetch related services that apply to this industry
        // For B2B alignment, we can fetch all services and reference them dynamically
        $services = Service::where('is_active', true)->take(4)->get();

        return view('frontend.industries.show', compact('industry', 'services'));
    }
}
