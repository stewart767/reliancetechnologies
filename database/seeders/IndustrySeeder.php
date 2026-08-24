<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $industries = [
            [
                'name' => 'Banking & Financial Services',
                'slug' => 'banking',
                'challenge' => 'Stricter security rules, rising mobile transaction rates, legacy systems, and threat vulnerabilities.',
                'opportunity' => 'Utilizing secure APIs, automated checks, and zero-trust networks to provide fast, compliant client systems.',
                'solution_desc' => 'Security testing, customized interface middleware, and real-time transaction monitoring configurations.',
                'sort_order' => 1,
                'is_active' => true,
                'meta_title' => 'Technology Solutions for Banks & Micro-finance',
                'meta_description' => 'Zero-trust networks, pen-testing, and compliance alignment for financial groups in Tanzania.'
            ],
            [
                'name' => 'Government & Public Sector',
                'slug' => 'government',
                'challenge' => 'Bridging legacy databases, protecting public records, and serving digital citizen needs efficiently.',
                'opportunity' => 'Implementing integrated portals, automated registries, and secure database structures.',
                'solution_desc' => 'Enterprise database integrations, public portals, and secure internal network management.',
                'sort_order' => 2,
                'is_active' => true,
                'meta_title' => 'Government ICT Integrations & Secure Portals',
                'meta_description' => 'Connect databases and citizen tracking services securely with public portals.'
            ],
            [
                'name' => 'Logistics & Transportation',
                'slug' => 'logistics',
                'challenge' => 'Managing routes, tracking cargo assets, dealing with paper bookings, and fuel costs.',
                'opportunity' => 'Deploying electric tricycle fleets, mobile tracking, and centralized booking dispatch software.',
                'solution_desc' => 'Custom dispatch platforms, YAOYAO electric tricycles, and network tracking nodes.',
                'sort_order' => 3,
                'is_active' => true,
                'meta_title' => 'Logistics Software & Green Fleet Mobility Solutions',
                'meta_description' => 'Optimize last-mile deliveries using tracking portals and electric cargo transport.'
            ],
            [
                'name' => 'Mining & Construction',
                'slug' => 'mining',
                'challenge' => 'Off-grid locations, equipment wear, site safety, and fragmented asset tracking.',
                'opportunity' => 'Connecting remote networks, deploying tracking databases, and securing communications.',
                'solution_desc' => 'Industrial wireless infrastructure, CCTV systems, and tailored operational databases.',
                'sort_order' => 4,
                'is_active' => true,
                'meta_title' => 'Off-Grid Wireless Networks & Telemetry for Mining',
                'meta_description' => 'Integrate industrial communication arrays and inventory dashboards for remote sites.'
            ],
            [
                'name' => 'Healthcare & Education',
                'slug' => 'healthcare',
                'challenge' => 'Protecting sensitive records, managing client bookings, and outdated tracking systems.',
                'opportunity' => 'Digitizing records securely, launching student portals, and connecting multi-site setups.',
                'solution_desc' => 'Compliance reviews, patient database setups, campus networks, and registration software.',
                'sort_order' => 5,
                'is_active' => true,
                'meta_title' => 'Secure Patient Records & Unified Campus Networks',
                'meta_description' => 'Implement registration systems and records directories matching privacy mandates.'
            ],
            [
                'name' => 'SMEs & Corporate Businesses',
                'slug' => 'corporates',
                'challenge' => 'Scaling IT platforms, handling system drops, and lack of dedicated security experts.',
                'opportunity' => 'Accessing outsourced managed support and utilizing scalable cloud application models.',
                'solution_desc' => 'Managed IT support, custom CRM/ERP development, and secure remote-office setups.',
                'sort_order' => 6,
                'is_active' => true,
                'meta_title' => 'Managed IT Helpdesk & Custom Systems for SMEs',
                'meta_description' => 'Scale operations cleanly with 24/7 technical helpdesk SLAs and custom ERP modules.'
            ]
        ];

        foreach ($industries as $ind) {
            Industry::updateOrCreate(['slug' => $ind['slug']], $ind);
        }
    }
}
