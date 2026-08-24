<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;

class InsightController extends Controller
{
    /**
     * Display a listing of blog posts.
     */
    public function index()
    {
        $posts = Post::where('is_published', true)
            ->with('category')
            ->orderBy('published_at', 'desc')
            ->paginate(6);

        $categories = Category::withCount(['posts' => function($query) {
            $query->where('is_published', true);
        }])->get();

        $featuredPost = Post::where('is_published', true)
            ->where('is_featured', true)
            ->orderBy('published_at', 'desc')
            ->first();

        return view('frontend.insights.index', compact('posts', 'categories', 'featuredPost'));
    }

    /**
     * Display the specified blog post.
     */
    public function show(Post $post)
    {
        if (!$post->is_published) {
            abort(404);
        }

        $categories = Category::all();
        
        $relatedPosts = Post::where('is_published', true)
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('frontend.insights.show', compact('post', 'categories', 'relatedPosts'));
    }

    /**
     * Display posts filtered by category.
     */
    public function category(Category $category)
    {
        $posts = Post::where('is_published', true)
            ->where('category_id', $category->id)
            ->orderBy('published_at', 'desc')
            ->paginate(6);

        $categories = Category::withCount(['posts' => function($query) {
            $query->where('is_published', true);
        }])->get();

        $featuredPost = null; // Omit featured post in filtered view

        return view('frontend.insights.index', compact('posts', 'categories', 'featuredPost', 'category'));
    }
}
