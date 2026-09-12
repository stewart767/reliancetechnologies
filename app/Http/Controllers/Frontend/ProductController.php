<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    /**
     * Show the products directory.
     */
    public function index()
    {
        $products = Cache::remember('products_directory', 86400, function () {
            return Product::where('is_active', true)
                ->orderBy('sort_order')
                ->get();
        });

        $softwareProducts = $products->where('type', 'software')->values();
        $hardwareProducts = $products->where('type', 'hardware')->values();

        return view('frontend.products.index', compact('softwareProducts', 'hardwareProducts'));
    }
}
