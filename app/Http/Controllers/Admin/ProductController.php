<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index()
    {
        $products = Product::orderBy('sort_order')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:software,hardware',
            'description' => 'required|string',
            'price' => 'nullable|string|max:255',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string',
            'specs' => 'nullable|array',
            'specs.*' => 'nullable|string',
            'icon' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'website_url' => 'nullable|string|max:255',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        // Filter out null/empty features/specs
        if (isset($validated['features'])) {
            $validated['features'] = array_values(array_filter($validated['features'], function($val) {
                return !is_null($val) && trim($val) !== '';
            }));
        }
        if (isset($validated['specs'])) {
            $validated['specs'] = array_values(array_filter($validated['specs'], function($val) {
                return !is_null($val) && trim($val) !== '';
            }));
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:software,hardware',
            'description' => 'required|string',
            'price' => 'nullable|string|max:255',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string',
            'specs' => 'nullable|array',
            'specs.*' => 'nullable|string',
            'icon' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'website_url' => 'nullable|string|max:255',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        // Filter out null/empty features/specs
        if (isset($validated['features'])) {
            $validated['features'] = array_values(array_filter($validated['features'], function($val) {
                return !is_null($val) && trim($val) !== '';
            }));
        } else {
            $validated['features'] = [];
        }
        
        if (isset($validated['specs'])) {
            $validated['specs'] = array_values(array_filter($validated['specs'], function($val) {
                return !is_null($val) && trim($val) !== '';
            }));
        } else {
            $validated['specs'] = [];
        }

        if ($request->hasFile('image')) {
            // Delete old image if it exists and was uploaded to storage/
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
