<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CategoryPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Seed Categories
        $categories = [
            'technology' => Category::updateOrCreate(['slug' => 'technology'], [
                'name' => 'Technology',
                'slug' => 'technology',
                'description' => 'General tech trends, hardware updates, and infrastructure developments.'
            ]),
            'cybersecurity' => Category::updateOrCreate(['slug' => 'cybersecurity'], [
                'name' => 'Cybersecurity',
                'slug' => 'cybersecurity',
                'description' => 'Security compliance updates, penetration reports, and zero-trust tips.'
            ]),
            'software' => Category::updateOrCreate(['slug' => 'software'], [
                'name' => 'Software',
                'slug' => 'software',
                'description' => 'Custom systems development, APIs, web applications, and databases.'
            ]),
            'business-automation' => Category::updateOrCreate(['slug' => 'business-automation'], [
                'name' => 'Business Automation',
                'slug' => 'business-automation',
                'description' => 'RPA, automated workflows, OCR, and telemetry systems.'
            ]),
            'ict' => Category::updateOrCreate(['slug' => 'ict'], [
                'name' => 'ICT',
                'slug' => 'ict',
                'description' => 'Information and Communication Technology solutions, networking, and server deployment.'
            ]),
            'digital-transformation' => Category::updateOrCreate(['slug' => 'digital-transformation'], [
                'name' => 'Digital Transformation',
                'slug' => 'digital-transformation',
                'description' => 'Cloud migrations, legacy systems modernizations, and process digitizations.'
            ])
        ];

        // 2. Seed Posts
        $posts = [
            [
                'category_id' => $categories['digital-transformation']->id,
                'title' => 'Strategic Cloud Migration: A Guide for East African Enterprises',
                'slug' => 'cloud-migration-benefits',
                'summary' => 'Understand the process, risks, and cost advantages of transitioning core database systems from on-premises servers to secure cloud solutions.',
                'content' => '<p>As regional connectivity options expand across East Africa, companies are looking to transition from traditional hardware setups to secure cloud environments. This guide explains key considerations for CIOs.</p><h4>1. Assessing Cloud Readiness</h4><p>Before moving databases, it is crucial to analyze network dependencies and verify that critical applications can run in cloud environments without latency problems.</p><h4>2. Selecting the Best Model</h4><p>Depending on data security rules, organizations can select a hybrid model, keeping sensitive customer records locally while deploying general operations on cloud servers.</p><h4>3. Ensuring Security During Transition</h4><p>Data should be encrypted during migration. Implementing strict Zero-Trust authentication protocols ensures that only verified staff can access data during the move.</p>',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(2),
                'meta_title' => 'Enterprise Cloud Migration Guide for Tanzania',
                'meta_description' => 'A guide for CIOs looking to migrate core systems to hybrid or public cloud server spaces safely.'
            ],
            [
                'category_id' => $categories['cybersecurity']->id,
                'title' => 'Modern Security Practices for Growing Business Networks',
                'slug' => 'cybersecurity-essentials-2026',
                'summary' => 'Prevent business disruptions by implementing zero-trust access control, continuous threat monitoring, and structured backup strategies.',
                'content' => '<p>Security threats are becoming increasingly complex. Relying solely on a password is no longer enough to protect sensitive files and client data. Businesses must adopt advanced security practices.</p><h4>1. Zero-Trust Access</h4><p>Zero-Trust operates on a simple rule: "Never trust, always verify." Every user and device attempting to access network files must be authenticated, regardless of whether they are in the office or remote.</p><h4>2. Vulnerability Management</h4><p>Run regular vulnerability checks to identify and fix security gaps before they can be exploited. Keeping systems patched is key to threat prevention.</p><h4>3. Resilient Data Backups</h4><p>Maintain offline, secure data backups. In the event of a system failure or attack, having current, isolated backups is critical for restoring operations quickly.</p>',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(5),
                'meta_title' => 'Zero-Trust Networks & Firewall Best Practices',
                'meta_description' => 'Defend databases against corporate ransomware using multi-factor credentials and isolated database backups.'
            ],
            [
                'category_id' => $categories['technology']->id,
                'title' => 'Electric Mobility: Reducing Delivery Costs in Urban Centers',
                'slug' => 'electric-tricycles-logistics',
                'summary' => 'How electric cargo tricycles help logistics and retail businesses manage rising fuel costs and lower overall carbon emissions.',
                'content' => '<p>Managing logistics costs in busy urban areas remains a major challenge for retail and delivery companies. Electric tricycles offer a reliable, cost-effective alternative for last-mile logistics.</p><h4>1. Lower Energy Costs</h4><p>Electric tricycles run on battery charge rather than fossil fuels. This significantly reduces fuel costs, especially along routes involving frequent stops.</p><h4>2. Simple Maintenance</h4><p>With fewer moving parts than internal combustion engines, electric drive systems require less maintenance, leading to reduced downtime for fleets.</p><h4>3. Eco-Friendly Operations</h4><p>Adopting electric transport aligns businesses with sustainability goals and prepares them for future environmental standards in urban transport.</p>',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(10),
                'meta_title' => 'Electric Tricycles in Urban Logistics Systems',
                'meta_description' => 'Save on delivery fleet fuel and maintenance overhead by moving to commercial electric cargo fleets.'
            ]
        ];

        foreach ($posts as $post) {
            Post::updateOrCreate(['slug' => $post['slug']], $post);
        }
    }
}
