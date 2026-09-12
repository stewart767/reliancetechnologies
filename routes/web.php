<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend as FE;
use App\Http\Controllers\Admin as AD;

// 1. PUBLIC FRONTEND ROUTES
Route::get('/', [FE\HomeController::class, 'index'])->name('home');
Route::get('/about', function() {
    return redirect()->route('about.overview');
})->name('about');

Route::get('/about/overview', [FE\AboutController::class, 'overview'])->name('about.overview');
Route::get('/about/leadership', [FE\AboutController::class, 'leadership'])->name('about.leadership');
Route::get('/about/certificates', [FE\AboutController::class, 'certificates'])->name('about.certificates');

Route::get('/services', [FE\ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service:slug}', [FE\ServiceController::class, 'show'])->name('services.show');

Route::get('/solutions', [FE\SolutionController::class, 'index'])->name('solutions.index');
Route::get('/solutions/{solution:slug}', [FE\SolutionController::class, 'show'])->name('solutions.show');

Route::get('/industries', [FE\IndustryController::class, 'index'])->name('industries.index');
Route::get('/industries/{industry:slug}', [FE\IndustryController::class, 'show'])->name('industries.show');

Route::get('/projects', [FE\ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project:slug}', [FE\ProjectController::class, 'show'])->name('projects.show');

Route::get('/products', [FE\ProductController::class, 'index'])->name('products.index');

Route::get('/insights', [FE\InsightController::class, 'index'])->name('insights.index');
Route::get('/insights/{post:slug}', [FE\InsightController::class, 'show'])->name('insights.show');
Route::get('/insights/category/{category:slug}', [FE\InsightController::class, 'category'])->name('insights.category');

Route::get('/yaoyao-energies-tricycles', [FE\YaoyaoController::class, 'index'])->name('yaoyao');

Route::get('/contact', [FE\ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [FE\ContactController::class, 'store'])->name('contact.store')->middleware('throttle:3,1');

Route::get('/search', [FE\SearchController::class, 'index'])->name('search');

Route::get('/privacy-policy', [FE\LegalController::class, 'privacy'])->name('privacy');
Route::get('/terms-and-conditions', [FE\LegalController::class, 'terms'])->name('terms');

// Dynamic XML Sitemap
Route::get('/sitemap.xml', [FE\HomeController::class, 'sitemap'])->name('sitemap');

// 2. ADMIN AUTHENTICATION ROUTES
Route::get('/admin/login', [AD\AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AD\AuthController::class, 'login']);
Route::post('/admin/logout', [AD\AuthController::class, 'logout'])->name('admin.logout');

// 3. SECURE ADMIN ROUTE GROUP
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [AD\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('services', AD\ServiceController::class)->except(['show']);
    Route::resource('solutions', AD\SolutionController::class)->except(['show']);
    Route::resource('industries', AD\IndustryController::class)->except(['show']);
    Route::resource('projects', AD\ProjectController::class)->except(['show']);
    Route::delete('projects/{project}/gallery/{image}', [AD\ProjectController::class, 'deleteImage'])->name('projects.gallery.destroy');
    Route::resource('products', AD\ProductController::class)->except(['show']);
    Route::resource('testimonials', AD\TestimonialController::class)->except(['show']);
    Route::resource('partners', AD\PartnerController::class)->except(['show']);
    Route::resource('posts', AD\PostController::class)->except(['show']);
    Route::resource('categories', AD\CategoryController::class)->except(['show']);
    Route::resource('faqs', AD\FaqController::class)->except(['show']);
    Route::resource('leaders', AD\LeaderController::class)->except(['show']);
    Route::resource('certificates', AD\CertificateController::class)->except(['show']);
    Route::resource('yaoyao-specs', AD\YaoyaoSpecController::class)->except(['show']);
    Route::resource('sliders', AD\SliderController::class)->except(['show']);

    Route::get('contact-submissions', [AD\ContactSubmissionController::class, 'index'])->name('contact-submissions.index');
    Route::get('contact-submissions/{submission}', [AD\ContactSubmissionController::class, 'show'])->name('contact-submissions.show');
    Route::put('contact-submissions/{submission}/status', [AD\ContactSubmissionController::class, 'updateStatus'])->name('contact-submissions.status');
    Route::delete('contact-submissions/{submission}', [AD\ContactSubmissionController::class, 'destroy'])->name('contact-submissions.destroy');

    Route::get('settings', [AD\CompanySettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [AD\CompanySettingController::class, 'update'])->name('settings.update');
});

// Secure deployment utility routes for cPanel/shared hosting environments
Route::get('/run-migrations', function () {
    if (request('key') !== 'reliance2026_deploy') {
        abort(403, 'Unauthorized');
    }
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        $output = \Illuminate\Support\Facades\Artisan::output();
        return response("<pre>Migration success:\n" . e($output) . "</pre>");
    } catch (\Exception $e) {
        return response("<pre>Migration failed:\n" . e($e->getMessage()) . "\n" . e($e->getTraceAsString()) . "</pre>", 500);
    }
});

Route::get('/clear-cache', function () {
    if (request('key') !== 'reliance2026_deploy') {
        abort(403, 'Unauthorized');
    }
    try {
        \Illuminate\Support\Facades\Artisan::call('config:clear');
        \Illuminate\Support\Facades\Artisan::call('route:clear');
        \Illuminate\Support\Facades\Artisan::call('view:clear');
        \Illuminate\Support\Facades\Artisan::call('cache:clear');
        $output = \Illuminate\Support\Facades\Artisan::output();
        return response("<pre>Cache cleared successfully:\n" . e($output) . "</pre>");
    } catch (\Exception $e) {
        return response("<pre>Cache clear failed:\n" . e($e->getMessage()) . "</pre>", 500);
    }
});
