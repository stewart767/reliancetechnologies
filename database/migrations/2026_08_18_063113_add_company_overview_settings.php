<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\CompanySetting;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Rename overview_description to overview_main_desc if it exists, otherwise create it
        $descSetting = CompanySetting::where('key', 'overview_description')->first();
        if ($descSetting) {
            $descSetting->update([
                'key' => 'overview_main_desc',
                'display_name' => 'Main Section Description',
            ]);
        } else {
            CompanySetting::updateOrCreate(
                ['key' => 'overview_main_desc'],
                [
                    'value' => 'Reliance Solutions & Technology was established to resolve a persistent challenge facing organizations in East Africa: fragmented IT deployments. Instead of forcing companies to coordinate separate software coders, hardware wire layers, and threat monitoring vendors, we act as a single, unified technology architect. Our engineering teams combine software development, secure database configurations, structured physical wiring, and electric fleet technologies into integrated business solutions. We design for high uptime, clean operations dashboards, and compliance with data rules, positioning your technology as a strategic asset.',
                    'display_name' => 'Main Section Description',
                    'group' => 'about_overview',
                    'type' => 'textarea',
                ]
            );
        }

        // 2. Add other settings
        CompanySetting::updateOrCreate(
            ['key' => 'overview_hero_title'],
            [
                'value' => 'Company Overview',
                'display_name' => 'Hero Title',
                'group' => 'about_overview',
                'type' => 'text',
            ]
        );

        CompanySetting::updateOrCreate(
            ['key' => 'overview_hero_desc'],
            [
                'value' => 'Reliance Solutions & Technology designs, integrates, and monitors complete IT architectures. We build systems that satisfy enterprise requirements, public directives, and green commercial logistics targets.',
                'display_name' => 'Hero Description',
                'group' => 'about_overview',
                'type' => 'textarea',
            ]
        );

        CompanySetting::updateOrCreate(
            ['key' => 'overview_main_subtitle'],
            [
                'value' => 'Unified Systems Architecture',
                'display_name' => 'Main Section Subtitle',
                'group' => 'about_overview',
                'type' => 'text',
            ]
        );

        CompanySetting::updateOrCreate(
            ['key' => 'overview_main_title'],
            [
                'value' => 'Technology Built Around Your Business',
                'display_name' => 'Main Section Title',
                'group' => 'about_overview',
                'type' => 'text',
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $mainDesc = CompanySetting::where('key', 'overview_main_desc')->first();
        if ($mainDesc) {
            $mainDesc->update([
                'key' => 'overview_description',
                'display_name' => 'Overview Main description',
            ]);
        }

        CompanySetting::whereIn('key', [
            'overview_hero_title',
            'overview_hero_desc',
            'overview_main_subtitle',
            'overview_main_title',
        ])->delete();
    }
};

