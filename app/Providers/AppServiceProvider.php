<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Load company settings into config dynamically
        try {
            $settings = Cache::rememberForever('company_settings', function () {
                return \App\Models\CompanySetting::pluck('value', 'key')->toArray();
            });
            config(['settings' => $settings]);
        } catch (\Throwable $e) {
            // Prevent failure during clean setup or before MySQL server connects
        }

        // Share Services, Solutions, and Industries globally with the frontend layout for mega-menu dropdowns
        view()->composer('layouts.app', function ($view) {
            try {
                $services = Cache::remember('global_services', 86400, function () {
                    return \App\Models\Service::where('is_active', true)->orderBy('sort_order')->get();
                });
                
                $solutions = Cache::remember('global_solutions', 86400, function () {
                    return \App\Models\Solution::where('is_active', true)->orderBy('sort_order')->get();
                });
                
                $industries = Cache::remember('global_industries', 86400, function () {
                    return \App\Models\Industry::where('is_active', true)->orderBy('sort_order')->get();
                });
            } catch (\Throwable $e) {
                $services = collect();
                $solutions = collect();
                $industries = collect();
            }

            $view->with([
                'globalServices' => $services,
                'globalSolutions' => $solutions,
                'globalIndustries' => $industries,
            ]);
        });

        // Register model cache flush observers for real-time cache eviction
        $observedModels = [
            \App\Models\Service::class,
            \App\Models\Solution::class,
            \App\Models\Industry::class,
            \App\Models\CompanySetting::class,
            \App\Models\Project::class,
            \App\Models\Post::class,
            \App\Models\Slider::class,
            \App\Models\Testimonial::class,
            \App\Models\Partner::class,
            \App\Models\Product::class,
            \App\Models\Leader::class,
            \App\Models\Certificate::class,
            \App\Models\Faq::class,
            \App\Models\YaoyaoSpec::class,
        ];
        foreach ($observedModels as $model) {
            $model::observe(\App\Observers\CacheFlushObserver::class);
        }
    }
}
