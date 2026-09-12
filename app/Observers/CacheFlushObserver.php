<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class CacheFlushObserver
{
    /**
     * Cache key map corresponding to models.
     */
    protected array $modelCacheMap = [
        \App\Models\Service::class => ['global_services'],
        \App\Models\Solution::class => ['global_solutions'],
        \App\Models\Industry::class => ['global_industries'],
        \App\Models\CompanySetting::class => ['company_settings'],
        \App\Models\Project::class => ['home_projects', 'all_published_projects', 'projects_index'],
        \App\Models\Post::class => ['home_posts', 'all_published_posts'],
        \App\Models\Slider::class => ['home_sliders'],
        \App\Models\Testimonial::class => ['home_testimonials'],
        \App\Models\Partner::class => ['home_partners'],
        \App\Models\Product::class => ['home_software_products', 'products_directory'],
        \App\Models\Leader::class => ['about_leaders'],
        \App\Models\Certificate::class => ['about_certificates'],
        \App\Models\Faq::class => ['yaoyao_faqs'],
        \App\Models\YaoyaoSpec::class => ['yaoyao_specs'],
    ];

    /**
     * Handle the Model "saved" event.
     */
    public function saved(Model $model): void
    {
        $this->flushCacheFor($model);
    }

    /**
     * Handle the Model "deleted" event.
     */
    public function deleted(Model $model): void
    {
        $this->flushCacheFor($model);
    }

    /**
     * Handle the Model "restored" event.
     */
    public function restored(Model $model): void
    {
        $this->flushCacheFor($model);
    }

    /**
     * Flush cache keys associated with the given model.
     */
    protected function flushCacheFor(Model $model): void
    {
        $class = get_class($model);
        if (isset($this->modelCacheMap[$class])) {
            foreach ($this->modelCacheMap[$class] as $cacheKey) {
                Cache::forget($cacheKey);
            }
        }
    }
}
