<?php

namespace Database\Seeders;

use App\Models\CompanySetting;
use Illuminate\Database\Seeder;

class CompanySettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // General
            [
                'key' => 'company_name',
                'value' => 'Reliance Solutions & Technology',
                'display_name' => 'Company Name',
                'group' => 'general',
                'type' => 'text'
            ],
            [
                'key' => 'website_url',
                'value' => 'https://reliancesolutions.co.tz',
                'display_name' => 'Website URL',
                'group' => 'general',
                'type' => 'text'
            ],
            [
                'key' => 'logo',
                'value' => null,
                'display_name' => 'Company Logo Image',
                'group' => 'general',
                'type' => 'file'
            ],
            [
                'key' => 'favicon',
                'value' => null,
                'display_name' => 'Favicon Icon File',
                'group' => 'general',
                'type' => 'file'
            ],
            [
                'key' => 'business_hours',
                'value' => 'Mon - Fri: 8:00 AM - 5:00 PM',
                'display_name' => 'Business Hours',
                'group' => 'general',
                'type' => 'text'
            ],
            [
                'key' => 'notification_recipient_email',
                'value' => 'inquiries@reliancesolutions.co.tz',
                'display_name' => 'Inquiry Notification Recipient Email',
                'group' => 'general',
                'type' => 'text'
            ],

            // Contact
            [
                'key' => 'contact_email',
                'value' => 'info@reliancesolutions.co.tz',
                'display_name' => 'Contact Email',
                'group' => 'contact',
                'type' => 'text'
            ],
            [
                'key' => 'contact_phone',
                'value' => '+255 22 212 3456',
                'display_name' => 'Contact Phone',
                'group' => 'contact',
                'type' => 'text'
            ],
            [
                'key' => 'whatsapp_number',
                'value' => '+255 779 304 500',
                'display_name' => 'WhatsApp Number',
                'group' => 'contact',
                'type' => 'text'
            ],
            [
                'key' => 'address',
                'value' => 'Dar es Salaam, Tanzania',
                'display_name' => 'Office Address',
                'group' => 'contact',
                'type' => 'text'
            ],
            [
                'key' => 'contact_page_subtitle',
                'value' => 'Get In Touch',
                'display_name' => 'Contact Page Subtitle',
                'group' => 'contact',
                'type' => 'text'
            ],
            [
                'key' => 'contact_page_title',
                'value' => 'Contact Us',
                'display_name' => 'Contact Page Title',
                'group' => 'contact',
                'type' => 'text'
            ],
            [
                'key' => 'contact_page_desc',
                'value' => 'Coordinate with our systems engineering team to schedule infrastructure audits, discuss software parameters, or customize electric logistics units.',
                'display_name' => 'Contact Page Description',
                'group' => 'contact',
                'type' => 'textarea'
            ],
            [
                'key' => 'contact_info_title',
                'value' => 'Reliance Solutions & Technology',
                'display_name' => 'Contact Info Section Title',
                'group' => 'contact',
                'type' => 'text'
            ],
            [
                'key' => 'contact_info_desc',
                'value' => 'We serve enterprise operations, government agencies, logistics networks, and industrial projects across Tanzania and East Africa.',
                'display_name' => 'Contact Info Section Description',
                'group' => 'contact',
                'type' => 'textarea'
            ],
            [
                'key' => 'contact_map_subtitle',
                'value' => 'Find Us',
                'display_name' => 'Map Section Subtitle',
                'group' => 'contact',
                'type' => 'text'
            ],
            [
                'key' => 'contact_map_title',
                'value' => 'Our Head Office',
                'display_name' => 'Map Section Title',
                'group' => 'contact',
                'type' => 'text'
            ],
            [
                'key' => 'contact_map_desc',
                'value' => 'Drop by our headquarters or use the map below to get directions. We are located in the heart of Dar es Salaam, Tanzania.',
                'display_name' => 'Map Section Description',
                'group' => 'contact',
                'type' => 'textarea'
            ],
            [
                'key' => 'contact_map_address',
                'value' => 'Dar es Salaam, Tanzania',
                'display_name' => 'Google Map Address/Coordinates',
                'group' => 'contact',
                'type' => 'text'
            ],

            // Social
            [
                'key' => 'facebook_url',
                'value' => 'https://facebook.com/reliancesolutions',
                'display_name' => 'Facebook Page',
                'group' => 'social',
                'type' => 'text'
            ],
            [
                'key' => 'instagram_url',
                'value' => 'https://instagram.com/reliancesolutions',
                'display_name' => 'Instagram Handle',
                'group' => 'social',
                'type' => 'text'
            ],
            [
                'key' => 'linkedin_url',
                'value' => 'https://linkedin.com/company/reliancesolutions',
                'display_name' => 'LinkedIn Company page',
                'group' => 'social',
                'type' => 'text'
            ],
            [
                'key' => 'twitter_url',
                'value' => 'https://x.com/reliancesolutions',
                'display_name' => 'Twitter/X Handle',
                'group' => 'social',
                'type' => 'text'
            ],

            // Hero Section
            [
                'key' => 'hero_heading',
                'value' => 'Technology That Moves Your Business Forward.',
                'display_name' => 'Hero Section Heading',
                'group' => 'hero',
                'type' => 'text'
            ],
            [
                'key' => 'hero_description',
                'value' => 'Innovative ICT, custom software, and digital solutions designed to help you operate smarter and grow faster.',
                'display_name' => 'Hero Section Description',
                'group' => 'hero',
                'type' => 'textarea'
            ],
            [
                'key' => 'hero_cta_primary_text',
                'value' => 'Talk to an Expert',
                'display_name' => 'Primary CTA Button Text',
                'group' => 'hero',
                'type' => 'text'
            ],
            [
                'key' => 'hero_cta_primary_url',
                'value' => '/contact',
                'display_name' => 'Primary CTA Button Link',
                'group' => 'hero',
                'type' => 'text'
            ],
            [
                'key' => 'hero_cta_secondary_text',
                'value' => 'Explore Solutions',
                'display_name' => 'Secondary CTA Button Text',
                'group' => 'hero',
                'type' => 'text'
            ],
            [
                'key' => 'hero_cta_secondary_url',
                'value' => '/solutions',
                'display_name' => 'Secondary CTA Button Link',
                'group' => 'hero',
                'type' => 'text'
            ],
            [
                'key' => 'hero_slide_1',
                'value' => 'images/hero/hero-bg.jpg',
                'display_name' => 'Hero Slide 1 Background Image',
                'group' => 'hero',
                'type' => 'text' // Store path as text by default, admin can edit or change
            ],
            [
                'key' => 'hero_slide_2',
                'value' => 'images/hero/hero-bg-2.jpg',
                'display_name' => 'Hero Slide 2 Background Image',
                'group' => 'hero',
                'type' => 'text'
            ],
            [
                'key' => 'hero_slide_3',
                'value' => 'images/hero/hero-bg-3.jpg',
                'display_name' => 'Hero Slide 3 Background Image',
                'group' => 'hero',
                'type' => 'text'
            ],

            // Stats
            [
                'key' => 'stat_experience',
                'value' => '10+ Years Experience',
                'display_name' => 'Statistic - Industry Experience',
                'group' => 'stats',
                'type' => 'text'
            ],
            [
                'key' => 'stat_projects',
                'value' => '100+ Projects Delivered',
                'display_name' => 'Statistic - Projects Delivered',
                'group' => 'stats',
                'type' => 'text'
            ],
            [
                'key' => 'stat_clients',
                'value' => '50+ Business Clients',
                'display_name' => 'Statistic - Active Business Clients',
                'group' => 'stats',
                'type' => 'text'
            ],
            [
                'key' => 'stat_satisfaction',
                'value' => '99% Client Satisfaction',
                'display_name' => 'Statistic - Client Satisfaction Rating',
                'group' => 'stats',
                'type' => 'text'
            ],

            // Why Reliance Section Metrics
            [
                'key' => 'why_metric_1_val',
                'value' => '99.9%',
                'display_name' => 'Why Reliance Metric 1 Value',
                'group' => 'why_reliance',
                'type' => 'text'
            ],
            [
                'key' => 'why_metric_1_lbl',
                'value' => 'Operational Uptime',
                'display_name' => 'Why Reliance Metric 1 Label',
                'group' => 'why_reliance',
                'type' => 'text'
            ],
            [
                'key' => 'why_metric_2_val',
                'value' => '150+',
                'display_name' => 'Why Reliance Metric 2 Value',
                'group' => 'why_reliance',
                'type' => 'text'
            ],
            [
                'key' => 'why_metric_2_lbl',
                'value' => 'Systems Integrated',
                'display_name' => 'Why Reliance Metric 2 Label',
                'group' => 'why_reliance',
                'type' => 'text'
            ],
            [
                'key' => 'why_metric_3_val',
                'value' => '24/7',
                'display_name' => 'Why Reliance Metric 3 Value',
                'group' => 'why_reliance',
                'type' => 'text'
            ],
            [
                'key' => 'why_metric_3_lbl',
                'value' => 'Active Monitoring',
                'display_name' => 'Why Reliance Metric 3 Label',
                'group' => 'why_reliance',
                'type' => 'text'
            ],
            [
                'key' => 'why_metric_4_val',
                'value' => '100%',
                'display_name' => 'Why Reliance Metric 4 Value',
                'group' => 'why_reliance',
                'type' => 'text'
            ],
            [
                'key' => 'why_metric_4_lbl',
                'value' => 'Zero-Trust Security',
                'display_name' => 'Why Reliance Metric 4 Label',
                'group' => 'why_reliance',
                'type' => 'text'
            ],

            // About Section
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
                'key' => 'about_description',
                'value' => 'Reliance Solutions & Technology helps organizations transform operational challenges into robust, secure, and unified systems architectures.',
                'display_name' => 'About Section Description',
                'group' => 'about',
                'type' => 'textarea'
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
            ],

            // Company Overview Page Configuration
            [
                'key' => 'overview_hero_image',
                'value' => 'images/about/about-hero.jpg',
                'display_name' => 'Overview Hero Image',
                'group' => 'about_overview',
                'type' => 'file'
            ],
            [
                'key' => 'overview_mission',
                'value' => 'To design and deliver secure, unified, and highly scalable technology architectures that eliminate operational silos, protect organizational data, and enable sustainable commercial growth.',
                'display_name' => 'Overview mission Statement',
                'group' => 'about_overview',
                'type' => 'textarea'
            ],
            [
                'key' => 'overview_vision',
                'value' => 'To be the region\'s most trusted technology engineering partner, recognized for setting international standards in database integrity, infrastructure reliability, and sustainable energy mobility systems.',
                'display_name' => 'Overview Vision Statement',
                'group' => 'about_overview',
                'type' => 'textarea'
            ],
            [
                'key' => 'overview_description',
                'value' => 'Reliance Solutions & Technology was established to resolve a persistent challenge facing organizations in East Africa: fragmented IT deployments. Instead of forcing companies to coordinate separate software coders, hardware wire layers, and threat monitoring vendors, we act as a single, unified technology architect.',
                'display_name' => 'Overview Main description',
                'group' => 'about_overview',
                'type' => 'textarea'
            ],

            // Section Visibilities
            [
                'key' => 'section_services',
                'value' => 'true',
                'display_name' => 'Show Services Showcase Section',
                'group' => 'visibility',
                'type' => 'text'
            ],
            [
                'key' => 'section_solutions',
                'value' => 'true',
                'display_name' => 'Show Solutions In Action Section',
                'group' => 'visibility',
                'type' => 'text'
            ],
            [
                'key' => 'section_industries',
                'value' => 'true',
                'display_name' => 'Show Sectors We Serve Section',
                'group' => 'visibility',
                'type' => 'text'
            ],
            [
                'key' => 'section_projects',
                'value' => 'true',
                'display_name' => 'Show Projects Log Section',
                'group' => 'visibility',
                'type' => 'text'
            ],
            [
                'key' => 'section_blog',
                'value' => 'true',
                'display_name' => 'Show Insights Blog Section',
                'group' => 'visibility',
                'type' => 'text'
            ],
            [
                'key' => 'section_faq',
                'value' => 'true',
                'display_name' => 'Show FAQ Accordion Section',
                'group' => 'visibility',
                'type' => 'text'
            ],
            [
                'key' => 'section_testimonials',
                'value' => 'true',
                'display_name' => 'Show Testimonials Carousel Section',
                'group' => 'visibility',
                'type' => 'text'
            ],
            [
                'key' => 'section_partners',
                'value' => 'true',
                'display_name' => 'Show Partners Showcase Section',
                'group' => 'visibility',
                'type' => 'text'
            ],
            // YAOYAO Energies
            [
                'key' => 'yaoyao_hero_heading',
                'value' => 'YAOYAO Energies Electric Tricycles.',
                'display_name' => 'YAOYAO Page Hero Heading',
                'group' => 'yaoyao_energies',
                'type' => 'text'
            ],
            [
                'key' => 'yaoyao_hero_description',
                'value' => 'Engineering green commercial transportation. YAOYAO Energies designs rugged, heavy-duty electric cargo tricycles configured to lower fleet costs, reduce carbon footprints, and simplify last-mile logistics.',
                'display_name' => 'YAOYAO Page Hero Description',
                'group' => 'yaoyao_energies',
                'type' => 'textarea'
            ],
            [
                'key' => 'yaoyao_hero_image',
                'value' => 'images/yaoyao/electric-tricycle.jpg',
                'display_name' => 'YAOYAO Page Hero Image',
                'group' => 'yaoyao_energies',
                'type' => 'file'
            ],
            // Legal Documents
            [
                'key' => 'privacy_policy',
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
                'display_name' => 'Privacy Policy Page Content (HTML allowed)',
                'group' => 'legal',
                'type' => 'textarea'
            ],
            [
                'key' => 'terms_conditions',
                'value' => '<p><strong>Effective Date: August 14, 2026</strong></p>' . "\n" .
                           '<p>By accessing reliancesolutions.co.tz and coordinating with Reliance Solutions & Technology for digital consulting, software development, cabling networks, or fleet procurement, you agree to comply with these terms.</p>' . "\n\n" .
                           '<h3 class="text-white font-title font-bold text-lg pt-4">1. Intellectual Property</h3>' . "\n" .
                           '<p>All text, layouts, graphics, database blueprints, code files, and brand markings on this site are protected by copyright laws. Custom software platforms delivered to clients operate under specific licenses defined in corporate SLA documents.</p>' . "\n\n" .
                           '<h3 class="text-white font-title font-bold text-lg pt-4">2. Liability Limits</h3>' . "\n" .
                           '<p>Reliance Solutions & Technology designs systems to maintain high availability. However, we do not accept liability for operational drops, database latency, or cyber threat breaches arising from third-party hardware failures or unapproved configurations made by client operators.</p>' . "\n\n" .
                           '<h3 class="text-white font-title font-bold text-lg pt-4">3. Governance</h3>' . "\n" .
                           '<p>These terms and all commercial project contracts are governed and interpreted under the laws of the United Republic of Tanzania.</p>',
                'display_name' => 'Terms & Conditions Page Content (HTML allowed)',
                'group' => 'legal',
                'type' => 'textarea'
            ]
        ];

        foreach ($settings as $setting) {
            CompanySetting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
