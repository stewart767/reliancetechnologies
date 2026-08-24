<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Solution;
use App\Models\Industry;
use App\Models\Project;
use App\Models\Post;
use App\Models\ContactSubmission;

class DashboardController extends Controller
{
    /**
     * Show the admin dashboard main screen.
     */
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'solutions' => Solution::count(),
            'industries' => Industry::count(),
            'projects' => Project::count(),
            'posts' => Post::count(),
            'inquiries' => ContactSubmission::where('status', 'pending')->count(),
        ];

        // Fetch latest contact inquiries
        $submissions = ContactSubmission::orderBy('created_at', 'desc')->take(10)->get();

        return view('admin.dashboard', compact('stats', 'submissions'));
    }
}
