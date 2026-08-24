<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\CompanySetting;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('company_settings')) {
            $settings = [
                [
                    'key' => 'about_subtitle',
                    'value' => 'Corporate Integration Partner',
                    'display_name' => 'About Section Subtitle',
                    'group' => 'about',
                    'type' => 'text'
                ],
                [
                    'key' => 'about_heading',
                    'value' => 'Technology Built Around Your Business',
                    'display_name' => 'About Section Heading',
                    'group' => 'about',
                    'type' => 'text'
                ],
                [
                    'key' => 'about_image',
                    'value' => 'images/about/who-we-are.jpg',
                    'display_name' => 'About Section Image',
                    'group' => 'about',
                    'type' => 'file'
                ],
                [
                    'key' => 'about_step1_title',
                    'value' => 'Understand',
                    'display_name' => 'About Step 1 Title',
                    'group' => 'about',
                    'type' => 'text'
                ],
                [
                    'key' => 'about_step1_desc',
                    'value' => 'We start by analyzing your operations, database constraints, and scaling goals.',
                    'display_name' => 'About Step 1 Description',
                    'group' => 'about',
                    'type' => 'textarea'
                ],
                [
                    'key' => 'about_step2_title',
                    'value' => 'Build',
                    'display_name' => 'About Step 2 Title',
                    'group' => 'about',
                    'type' => 'text'
                ],
                [
                    'key' => 'about_step2_desc',
                    'value' => 'Our engineers design, code, and wire the right solution for complete deployment.',
                    'display_name' => 'About Step 2 Description',
                    'group' => 'about',
                    'type' => 'textarea'
                ],
                [
                    'key' => 'about_step3_title',
                    'value' => 'Support',
                    'display_name' => 'About Step 3 Title',
                    'group' => 'about',
                    'type' => 'text'
                ],
                [
                    'key' => 'about_step3_desc',
                    'value' => 'We provide managed helpdesk ticketing, SLAs, and updates past rollout.',
                    'display_name' => 'About Step 3 Description',
                    'group' => 'about',
                    'type' => 'textarea'
                ]
            ];

            foreach ($settings as $setting) {
                CompanySetting::updateOrCreate(['key' => $setting['key']], $setting);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('company_settings')) {
            CompanySetting::whereIn('key', [
                'about_subtitle',
                'about_image',
                'about_step1_title',
                'about_step1_desc',
                'about_step2_title',
                'about_step2_desc',
                'about_step3_title',
                'about_step3_desc'
            ])->delete();
        }
    }
};
