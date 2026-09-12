<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Services table indexes
        Schema::table('services', function (Blueprint $table) {
            $table->index(['is_active', 'sort_order'], 'idx_services_active_sort');
        });

        // 2. Solutions table indexes
        Schema::table('solutions', function (Blueprint $table) {
            $table->index(['is_active', 'sort_order'], 'idx_solutions_active_sort');
        });

        // 3. Industries table indexes
        Schema::table('industries', function (Blueprint $table) {
            $table->index(['is_active', 'sort_order'], 'idx_industries_active_sort');
        });

        // 4. Projects table indexes
        Schema::table('projects', function (Blueprint $table) {
            $table->index(['is_published', 'is_featured'], 'idx_projects_pub_feat');
            $table->index(['is_published', 'created_at'], 'idx_projects_pub_created');
        });

        // 5. Posts table indexes
        Schema::table('posts', function (Blueprint $table) {
            $table->index(['is_published', 'published_at'], 'idx_posts_pub_date');
            $table->index(['is_published', 'is_featured'], 'idx_posts_pub_feat');
        });

        // 6. Products table indexes
        Schema::table('products', function (Blueprint $table) {
            $table->index(['type', 'is_active', 'sort_order'], 'idx_products_type_active_sort');
        });

        // 7. Sliders table indexes
        Schema::table('sliders', function (Blueprint $table) {
            $table->index(['is_active', 'sort_order'], 'idx_sliders_active_sort');
        });

        // 8. Testimonials table indexes
        Schema::table('testimonials', function (Blueprint $table) {
            $table->index(['is_active', 'sort_order'], 'idx_testimonials_active_sort');
        });

        // 9. Partners table indexes
        Schema::table('partners', function (Blueprint $table) {
            $table->index(['is_active', 'sort_order'], 'idx_partners_active_sort');
        });

        // 10. FAQs table indexes
        Schema::table('faqs', function (Blueprint $table) {
            $table->index(['is_active', 'sort_order'], 'idx_faqs_active_sort');
            $table->index(['category', 'is_active'], 'idx_faqs_cat_active');
        });

        // 11. Leaders table indexes
        Schema::table('leaders', function (Blueprint $table) {
            $table->index(['is_active', 'sort_order'], 'idx_leaders_active_sort');
        });

        // 12. Certificates table indexes
        Schema::table('certificates', function (Blueprint $table) {
            $table->index(['is_active', 'sort_order'], 'idx_certificates_active_sort');
        });

        // 13. Yaoyao Specs table indexes
        Schema::table('yaoyao_specs', function (Blueprint $table) {
            $table->index(['sort_order'], 'idx_yaoyao_specs_sort');
            $table->index(['group', 'sort_order'], 'idx_yaoyao_specs_group_sort');
        });

        // 14. Contact Submissions table indexes
        Schema::table('contact_submissions', function (Blueprint $table) {
            $table->index(['status', 'created_at'], 'idx_submissions_status_created');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropIndex('idx_services_active_sort');
        });
        Schema::table('solutions', function (Blueprint $table) {
            $table->dropIndex('idx_solutions_active_sort');
        });
        Schema::table('industries', function (Blueprint $table) {
            $table->dropIndex('idx_industries_active_sort');
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->dropIndex('idx_projects_pub_feat');
            $table->dropIndex('idx_projects_pub_created');
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndex('idx_posts_pub_date');
            $table->dropIndex('idx_posts_pub_feat');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('idx_products_type_active_sort');
        });
        Schema::table('sliders', function (Blueprint $table) {
            $table->dropIndex('idx_sliders_active_sort');
        });
        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropIndex('idx_testimonials_active_sort');
        });
        Schema::table('partners', function (Blueprint $table) {
            $table->dropIndex('idx_partners_active_sort');
        });
        Schema::table('faqs', function (Blueprint $table) {
            $table->dropIndex('idx_faqs_active_sort');
            $table->dropIndex('idx_faqs_cat_active');
        });
        Schema::table('leaders', function (Blueprint $table) {
            $table->dropIndex('idx_leaders_active_sort');
        });
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropIndex('idx_certificates_active_sort');
        });
        Schema::table('yaoyao_specs', function (Blueprint $table) {
            $table->dropIndex('idx_yaoyao_specs_sort');
            $table->dropIndex('idx_yaoyao_specs_group_sort');
        });
        Schema::table('contact_submissions', function (Blueprint $table) {
            $table->dropIndex('idx_submissions_status_created');
        });
    }
};
