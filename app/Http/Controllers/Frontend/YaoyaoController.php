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
         $faqs = Faq::where('is_active', true)
             ->where('category', 'YAOYAO Energies')
             ->orderBy('sort_order')
             ->get();
 
         // Retrieve specs from database
         $dbSpecs = YaoyaoSpec::orderBy('sort_order')->get();
         
         // Group specs as group_name => [key => value] to match original structure
         $specs = [];
         foreach ($dbSpecs as $s) {
             $specs[$s->group][$s->key] = $s->value;
         }
 
         return view('frontend.yaoyao.index', compact('faqs', 'specs'));
     }
}
