<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\YaoyaoSpec;

class YaoyaoController extends Controller
{
    /**
     * Show the YAOYAO Energies product page.
     */
     public function index()
     {
         // Load FAQs related to green mobility
         $faqs = \Illuminate\Support\Facades\Cache::remember('yaoyao_faqs', 86400, function () {
             return Faq::where('is_active', true)
                 ->where('category', 'YAOYAO Energies')
                 ->orderBy('sort_order')
                 ->get();
         });
 
         // Retrieve specs from database
         $specs = \Illuminate\Support\Facades\Cache::remember('yaoyao_specs', 86400, function () {
             $dbSpecs = YaoyaoSpec::orderBy('sort_order')->get();
             $grouped = [];
             foreach ($dbSpecs as $s) {
                 $grouped[$s->group][$s->key] = $s->value;
             }
             return $grouped;
         });
 
         return view('frontend.yaoyao.index', compact('faqs', 'specs'));
     }
}
