<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of services.
     */
    public function index()
    {
        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('frontend.services.index', compact('services'));
    }

    /**
     * Display the specified service.
     */
    public function show(Service $service)
    {
        if (!$service->is_active) {
            abort(404);
        }

        // Fetch related services (excluding current)
        $relatedServices = Service::where('is_active', true)
            ->where('id', '!=', $service->id)
            ->take(3)
            ->get();

        return view('frontend.services.show', compact('service', 'relatedServices'));
    }
}
