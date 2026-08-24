<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // Load company settings into config dynamically if database table exists
        try {
            if (\Schema::hasTable('company_settings')) {
                $settings = \Cache::rememberForever('company_settings', function () {
                    return \App\Models\CompanySetting::all()->pluck('value', 'key')->toArray();
                });
                config(['settings' => $settings]);
            }
        } catch (\Exception $e) {
            // Prevent failure during clean setup or before MySQL server connects
        }

        // Share Services, Solutions, and Industries globally with the frontend layout for mega-menu dropdowns
        view()->composer('layouts.app', function ($view) {
            try {
                $services = \Schema::hasTable('services')
                    ? \App\Models\Service::where('is_active', true)->orderBy('sort_order')->get()
                    : collect();
                
                $solutions = \Schema::hasTable('solutions')
                    ? \App\Models\Solution::where('is_active', true)->orderBy('sort_order')->get()
                    : collect();
                
                $industries = \Schema::hasTable('industries')
                    ? \App\Models\Industry::where('is_active', true)->orderBy('sort_order')->get()
                    : collect();
            } catch (\Exception $e) {
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
    }
}
