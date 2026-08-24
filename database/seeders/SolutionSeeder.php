<?php

namespace Database\Seeders;

use App\Models\Solution;
use Illuminate\Database\Seeder;

class SolutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $solutions = [
            [
                'title' => 'Digital Transformation',
                'slug' => 'digital-transformation',
                'subtitle' => 'Modernize operations from the ground up',
                'short_description' => 'We assist organizations in transitioning away from slow, paper-driven, or isolated legacy processes.',
                'description' => 'We assist organizations in transitioning away from slow, paper-driven, or isolated legacy processes. By integrating cloud technology, automated pipelines, and custom portals, we help you achieve greater speed, adaptability, and operational transparency.',
                'capabilities' => [
                    'Cloud Migration & Server Architectures',
                    'Legacy System Audits & Technical Modernization',
                    'Operational Process Flow Digitization',
                    'Custom Corporate Portals & Web Hubs'
                ],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
                'meta_title' => 'Integrated Digital Transformation Solutions',
                'meta_description' => 'Transition away from isolated legacy databases and processes through custom cloud systems.'
            ],
            [
                'title' => 'Smart Business Systems',
                'slug' => 'smart-business-systems',
                'subtitle' => 'Operational control through tailored software',
                'short_description' => 'Standard off-the-shelf software often leaves functional gaps. We design customized ERPs and workflows.',
                'description' => 'Standard off-the-shelf software often leaves functional gaps. We design customized ERPs, workflow managers, and dashboard reporting modules that match your team\'s workflow, ensuring clean data collection and clear management dashboards.',
                'capabilities' => [
                    'Tailored Enterprise Resource Planning (ERP) Modules',
                    'Customer Relationship Managers (CRM) Configured for local dynamics',
                    'Workflow & Operations Monitoring Dashboards',
                    'Custom Invoicing and Reconciliation Engines'
                ],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
                'meta_title' => 'Custom ERP & Smart Business Dashboards',
                'meta_description' => 'Configure customized systems that precisely match your team\'s reporting and operational flows.'
            ],
            [
                'title' => 'Secure Digital Infrastructure',
                'slug' => 'secure-infrastructure',
                'subtitle' => 'Highly resilient network design and threat defense',
                'short_description' => 'We design secure enterprise network backbones, structured wiring, and overlay cybersecurity monitoring.',
                'description' => 'Reliable connectivity and data security are the baseline of modern B2B operations. We design secure enterprise network backbones, structured office cabling, server layouts, and overlay them with proactive cybersecurity monitoring to keep your assets protected.',
                'capabilities' => [
                    'Structured Network Cabling & Redundant Switch Setups',
                    'Secure On-Premises and Hybrid Private Cloud Servers',
                    'Zero-Trust Network Access (ZTNA) Frameworks',
                    'Continuous Threat Monitoring & Endpoint Defense'
                ],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
                'meta_title' => 'Zero-Trust Networks & Server Room Installation',
                'meta_description' => 'Ensure robust connectivity combined with active firewalls and database backup protection.'
            ],
            [
                'title' => 'Intelligent Automation',
                'slug' => 'intelligent-automation',
                'subtitle' => 'Shift focus from repetitive work to strategic growth',
                'short_description' => 'Free your team from repetitive manual data entries using robotic processes, OCR engines, and alerts.',
                'description' => 'Free your team from repetitive manual data entries. By leveraging robotic processes, OCR engines, and automated routing, we help businesses accelerate administrative tasks while minimizing risk and error rates.',
                'capabilities' => [
                    'Robotic Process Automation (RPA)',
                    'Automated Invoicing & Customer Messaging Pipelines',
                    'Intelligent Document Reading (OCR) systems',
                    'Operational Asset & Sensor telemetry alerts'
                ],
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 4,
                'meta_title' => 'Automated Workflows & RPA Systems',
                'meta_description' => 'Deploy robotic automated process pipelines to cut invoicing, tracking, and messaging delays.'
            ],
            [
                'title' => 'Enterprise System Integration',
                'slug' => 'enterprise-integration',
                'subtitle' => 'A unified technology ecosystem without data silos',
                'short_description' => 'Stop relying on spreadsheets to bridge disconnected software systems. We build robust middleware.',
                'description' => 'Stop relying on spreadsheets to bridge disconnected software systems. We build robust middleware and API structures that link your databases, inventory programs, client platforms, and payment providers in real-time.',
                'capabilities' => [
                    'Custom Middleware & Database Synchronization scripts',
                    'Local Mobile Money & Payment Gateway integrations',
                    'API Wrapper engineering for legacy software applications',
                    'Internet of Things (IoT) hardware-to-database connections'
                ],
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 5,
                'meta_title' => 'Enterprise API Connectivity & Sync Middleware',
                'meta_description' => 'Unify disconnected software packages and databases into single, automated data loops.'
            ]
        ];

        foreach ($solutions as $sol) {
            Solution::updateOrCreate(['slug' => $sol['slug']], $sol);
        }
    }
}
