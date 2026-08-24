<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Leader;
use App\Models\Certificate;

class AboutController extends Controller
{
    /**
     * Show the company overview page.
     */
    public function overview()
    {
        return view('frontend.about.overview');
    }

    /**
     * Show the leadership page.
     */
    public function leadership()
    {
        $leaders = Leader::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('frontend.about.leadership', compact('leaders'));
    }

    /**
     * Show the certificates and awards page.
     */
    public function certificates()
    {
        $certificates = Certificate::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('frontend.about.certificates', compact('certificates'));
    }
}
