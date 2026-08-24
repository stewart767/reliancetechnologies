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
            CompanySetting::updateOrCreate(
                ['key' => 'privacy_policy'],
                [
                    'display_name' => 'Privacy Policy Page Content (HTML allowed)',
                    'value' => '<p><strong>Effective Date: August 14, 2026</strong></p>' . "\n" .
                               '<p>At Reliance Solutions & Technology, we are committed to safeguarding the privacy of our clients, website visitors, and service operators. This Privacy Policy details how we collect, process, and secure personal and organizational information.</p>' . "\n\n" .
                               '<h3 class="text-white font-title font-bold text-lg pt-4">1. Information We Collect</h3>' . "\n" .
                               '<p>We collect information you provide directly via contact forms, inquiries, and service registrations. This includes:</p>' . "\n" .
                               '<ul class="list-disc pl-6 space-y-1">' . "\n" .
                               '    <li>Full Name and contact coordinates (email, telephone).</li>' . "\n" .
                               '    <li>Company name and organizational position.</li>' . "\n" .
                               '    <li>Specific technological service requests and message logs.</li>' . "\n" .
                               '</ul>' . "\n\n" .
                               '<h3 class="text-white font-title font-bold text-lg pt-4">2. Database Processing</h3>' . "\n" .
                               '<p>We process information to analyze system inquiries, send quotation details, respond to SLAs, and coordinate electric fleet logistics under company directives. We do not sell or lease customer database records to third-party marketing companies.</p>' . "\n\n" .
                               '<h3 class="text-white font-title font-bold text-lg pt-4">3. Security Defenses</h3>' . "\n" .
                               '<p>In accordance with zero-trust security guidelines, we deploy firewalls, SSL encryption, session tokens, and database access controls to safeguard logged submissions against unauthorized access or breaches.</p>',
                    'group' => 'legal',
                    'type' => 'textarea',
                ]
            );

            CompanySetting::updateOrCreate(
                ['key' => 'terms_conditions'],
                [
                    'display_name' => 'Terms & Conditions Page Content (HTML allowed)',
                    'value' => '<p><strong>Effective Date: August 14, 2026</strong></p>' . "\n" .
                               '<p>By accessing reliancesolutions.co.tz and coordinating with Reliance Solutions & Technology for digital consulting, software development, cabling networks, or fleet procurement, you agree to comply with these terms.</p>' . "\n\n" .
                               '<h3 class="text-white font-title font-bold text-lg pt-4">1. Intellectual Property</h3>' . "\n" .
                               '<p>All text, layouts, graphics, database blueprints, code files, and brand markings on this site are protected by copyright laws. Custom software platforms delivered to clients operate under specific licenses defined in corporate SLA documents.</p>' . "\n\n" .
                               '<h3 class="text-white font-title font-bold text-lg pt-4">2. Liability Limits</h3>' . "\n" .
                               '<p>Reliance Solutions & Technology designs systems to maintain high availability. However, we do not accept liability for operational drops, database latency, or cyber threat breaches arising from third-party hardware failures or unapproved configurations made by client operators.</p>' . "\n\n" .
                               '<h3 class="text-white font-title font-bold text-lg pt-4">3. Governance</h3>' . "\n" .
                               '<p>These terms and all commercial project contracts are governed and interpreted under the laws of the United Republic of Tanzania.</p>',
                    'group' => 'legal',
                    'type' => 'textarea',
                ]
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('company_settings')) {
            CompanySetting::whereIn('key', ['privacy_policy', 'terms_conditions'])->delete();
        }
    }
};
