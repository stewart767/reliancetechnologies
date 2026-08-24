<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Industry;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get Industry IDs by slug
        $govtId = Industry::where('slug', 'government')->first()?->id ?? 2;
        $logisticsId = Industry::where('slug', 'logistics')->first()?->id ?? 3;
        $corpId = Industry::where('slug', 'corporates')->first()?->id ?? 6;

        $projects = [
            [
                'title' => 'Ajira Market',
                'slug' => 'ajira-market',
                'industry_id' => $corpId,
                'client_name' => 'Ajira Market Team',
                'challenge' => 'Tanzanian job seekers faced high friction in finding verified employer listings, while recruiters struggled with manual application filtering and untrusted references.',
                'solution' => 'Reliance Solutions engineered Ajira Market, a high-throughput job portal featuring real-time verification APIs, resume indexing engines, and multi-tenant recruiter dashboards.',
                'technology' => 'Laravel, MySQL, Redis, TailwindCSS, Livewire',
                'results' => 'Streamlined hiring pipelines for over 500 active companies, providing automated verification and resume screening.',
                'featured_image' => 'projects/ajira-market.jpg',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Smart Sale',
                'slug' => 'smart-sale',
                'industry_id' => $corpId,
                'client_name' => 'Smart Sale Retailers',
                'challenge' => 'Retail stores and wholesalers lacked an integrated system to track live inventory counts across multiple branches, leading to stock discrepancies and manual audit losses.',
                'solution' => 'We developed Smart Sale, a cloud-first retail management and POS platform offering real-time sales telemetry, offline sales buffer sync, and barcoding features.',
                'technology' => 'Laravel, React, PostgreSQL, SQLite, PWA',
                'results' => 'Eliminated audit losses across 200+ retail outlets through instant multi-branch inventory tracking.',
                'featured_image' => 'projects/smart-sale.jpg',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Employee Reference Bureau',
                'slug' => 'employee-reference-bureau',
                'industry_id' => $govtId,
                'client_name' => 'ERB Authority',
                'challenge' => 'Tanzanian companies and institutions lacked a secure, centralized directory to verify professional history and backgrounds, opening risks to credential fraud.',
                'solution' => 'Designed a secure verification registry (ERB) built on zero-trust architectures, allowing certified institutions to conduct authenticated background checks.',
                'technology' => 'Laravel, Zero-Trust Encryption, PostgreSQL, AlpineJS',
                'results' => 'Established a national benchmark for reference verification, checking over 100,000 professional entries.',
                'featured_image' => 'projects/erb.jpg',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Team Track',
                'slug' => 'team-track',
                'industry_id' => $corpId,
                'client_name' => 'Team Track Operations',
                'challenge' => 'Enterprise field service companies faced coordination gaps, unable to track real-time locations or task statuses of field technicians, leading to poor customer SLAs.',
                'solution' => 'We built Team Track, an interactive field service portal combining GPS telemetry tracking, automated routing, and mobile offline task reports.',
                'technology' => 'Laravel, React Native, Redis, Leaflet maps',
                'results' => 'Boosted field service SLA compliance by 40% through real-time GPS routes and task tracking.',
                'featured_image' => 'projects/team-track.jpg',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Yao Yao Energies',
                'slug' => 'yao-yao-energies',
                'industry_id' => $logisticsId,
                'client_name' => 'YAOYAO Energies Ltd',
                'challenge' => 'Urban last-mile fleets in East Africa face massive fuel overheads and lack tracking tools to optimize electric tricycle battery swap stations.',
                'solution' => 'Developed the centralized YAOYAO telemetry portal, allowing dispatchers to trace coordinates, swap history, and battery states of electric cargo fleets.',
                'technology' => 'Laravel, IoT APIs, PostgreSQL, TailwindCSS',
                'results' => 'Connected 500+ last-mile electric tricycles to real-time swap stations, lowering transportation overheads by 55%.',
                'featured_image' => 'projects/yaoyao.jpg',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Peak HR Solutions',
                'slug' => 'peak-hr-solutions',
                'industry_id' => $corpId,
                'client_name' => 'Peak HR',
                'challenge' => 'HR managers struggled with legacy spreadsheets for payroll, inconsistent tax compliance with local authorities, and fragmented employee benefit logs.',
                'solution' => 'We built Peak HR, a compliant human resource portal providing automated payroll calculations, local tax auto-filing, and centralized employee benefits.',
                'technology' => 'Laravel, MySQL, PDF processing engines, TRA tax APIs',
                'results' => 'Automated monthly payroll runs for 15,000+ employees, keeping them compliant with local tax authorities.',
                'featured_image' => 'projects/peak-hr.jpg',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => now(),
            ],
        ];

        foreach ($projects as $proj) {
            Project::updateOrCreate(['slug' => $proj['slug']], $proj);
        }
    }
}
