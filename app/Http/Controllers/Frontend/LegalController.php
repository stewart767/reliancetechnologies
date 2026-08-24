<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class LegalController extends Controller
{
    /**
     * Display the privacy policy page.
     */
    public function privacy()
    {
        return view('frontend.legal.privacy');
    }

    /**
     * Display the terms and conditions page.
     */
    public function terms()
    {
        return view('frontend.legal.terms');
    }
}
