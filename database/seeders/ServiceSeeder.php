<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'AI, Automation & Intelligent Technology',
                'slug' => 'ai-automation',
                'short_description' => 'Leverage artificial intelligence, RPA, and intelligent systems to streamline workflows, eliminate redundancies, and accelerate decision-making.',
                'description' => 'We assist organizations in deploying practical AI and machine learning architectures, automated process pipelines, and intelligent decision systems designed to enhance organizational speed and output quality.',
                'capabilities' => [
                    'Robotic Process Automation (RPA) tasks',
                    'Predictive analytics engines',
                    'Natural Language Processing (NLP) models',
                    'Computer vision inspection systems',
                    'Workflow orchestration logic'
                ],
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="15" x2="23" y2="15"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="15" x2="4" y2="15"></line></svg>',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
                'meta_title' => 'AI & Intelligent Automation Solutions in Tanzania',
                'meta_description' => 'Integrate AI models, predictive analysis, and RPA into your business processes.'
            ],
            [
                'title' => 'IT Consulting & Managed Services',
                'slug' => 'it-consulting',
                'short_description' => 'Strategic IT roadmap consulting, dedicated support infrastructure, real-time tracking, and ongoing tech stack optimization.',
                'description' => 'Position technology as a strategic asset. We design future-proof IT roadmaps, oversee tech transitions, and act as your dedicated managed service provider, ensuring high availability and seamless support.',
                'capabilities' => [
                    'IT roadmap & ROI planning',
                    '24/7 managed SLA helpdesk',
                    'Cloud infrastructure setups',
                    'System compliance audits',
                    'Technology risk assessment'
                ],
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
                'meta_title' => 'Managed IT & Technical Consulting Services',
                'meta_description' => 'Outsource IT support desk, cloud management, and compliance reviews to experts.'
            ],
            [
                'title' => 'Cybersecurity Services',
                'slug' => 'cybersecurity',
                'short_description' => 'Zero-trust architecture, threat monitoring, vulnerability scanning, and incident response frameworks to protect digital enterprise assets.',
                'description' => 'Guard your operations from evolving modern threats. We design comprehensive security programs including vulnerability scans, intrusion response protocols, and security-hardened firewalls.',
                'capabilities' => [
                    'Vulnerability scans (VAPT)',
                    'Zero-trust access setups',
                    'Endpoint threat monitoring',
                    'Firewall configuration',
                    'Incident response playbooks'
                ],
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
                'meta_title' => 'Enterprise Cybersecurity & VAPT in Tanzania',
                'meta_description' => 'Secure databases and cloud assets through zero-trust architectures and penetration scans.'
            ],
            [
                'title' => 'Software Development Services',
                'slug' => 'software-development',
                'short_description' => 'Custom enterprise portals, web platforms, mobile apps, and robust systems custom-built for operational scale and data efficiency.',
                'description' => 'We engineer high-performance custom applications, web portals, APIs, and business systems configured to support heavy database throughput and provide clean, modern user interfaces.',
                'capabilities' => [
                    'Custom ERP & CRM modules',
                    'Payment gateway sync',
                    'Secure API engineering',
                    'Database optimization',
                    'Mobile application coding'
                ],
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 4,
                'meta_title' => 'Custom Software Development & ERP Systems',
                'meta_description' => 'Develop bespoke web applications, payment gateways, and APIs matching your workflow.'
            ],
            [
                'title' => 'ICT Infrastructure Services',
                'slug' => 'ict-infrastructure',
                'short_description' => 'High-availability networking, structured cabling, server room deployment, fiber configurations, and connectivity frameworks.',
                'description' => 'We design, install, and optimize the hardware foundations that keep operations online. This includes robust networking, structured wiring, and redundant server room infrastructure.',
                'capabilities' => [
                    'Structured Cat6/Fiber cabling',
                    'Redundant switch setups',
                    'Server room installation',
                    'IP camera CCTV setups',
                    'Biometric lock configuration'
                ],
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 5,
                'meta_title' => 'Structured Cabling & Server Room Setup',
                'meta_description' => 'Physical network design, fiber connections, and server room configuration.'
            ],
            [
                'title' => 'YAOYAO Energies Tricycles',
                'slug' => 'yaoyao-energies',
                'short_description' => 'Sustainable e-mobility transport for commercial, logistics, and industrial fleets, reducing carbon footprint and fuel dependencies.',
                'description' => 'A dedicated green division of Reliance. YAOYAO Energies focuses on supplying heavy-duty electric and eco-friendly tricycles engineered to meet rugged regional transportation demands.',
                'capabilities' => [
                    'Electric cargo transport fleets',
                    'Battery swapping technologies',
                    'Insulated box configurations',
                    'Telemetry software links',
                    'Local replacement parts supply'
                ],
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 6,
                'meta_title' => 'YAOYAO Energies - Commercial Electric Tricycles',
                'meta_description' => 'Sustainable commercial electric cargo tricycles designed for regional urban transport.'
            ],
            [
                'title' => 'Industry-Specific Technology Solutions',
                'slug' => 'industry-solutions',
                'short_description' => 'Customized technological integrations designed to resolve the specific operational challenges of your industry sector.',
                'description' => 'We do not believe in one-size-fits-all IT. We adapt networks, database structures, and devices to align with sector-specific operational realities.',
                'capabilities' => [
                    'Banking interface bridges',
                    'Remote telemetry loops',
                    'Public register databases',
                    'HIS records integrations',
                    'Agricultural export tracking'
                ],
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 7,
                'meta_title' => 'Industry-Specific Systems Integration in Tanzania',
                'meta_description' => 'Sector targeted networks, remote databases, and dashboards for mining, logistics, and banks.'
            ],
            [
                'title' => 'System Integration Services',
                'slug' => 'system-integration',
                'short_description' => 'Connecting software modules, database warehouses, networks, and external APIs to function as a single system.',
                'description' => 'Bridge data silos. We integrate enterprise resource software, operational databases, third-party APIs, and hardware systems so your data flows instantly and correctly.',
                'capabilities' => [
                    'Custom API middleware sync',
                    'Mobile payment system sync',
                    'Legacy system API wraps',
                    'IoT sensor connection links',
                    'Database ETL data runs'
                ],
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-merge"><circle cx="18" cy="18" r="3"></circle><circle cx="6" cy="6" r="3"></circle><path d="M6 9a9 9 0 0 1 9 9"></path></svg>',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 8,
                'meta_title' => 'System Integration & API Connectivity',
                'meta_description' => 'Sync databases, integrate mobile payment networks (M-Pesa), and connect legacy code.'
            ],
            [
                'title' => 'SAP Solutions',
                'slug' => 'sap-solutions',
                'short_description' => 'S/4HANA & SAP Business one.',
                'description' => 'We configure, customize, and deploy enterprise SAP Solutions, including S/4HANA and SAP Business One, tailored to your corporate environment.',
                'capabilities' => [
                    'S/4HANA configurations',
                    'SAP Business One mapping',
                    'Finance & Ledger bridges',
                    'Operations workflows sync',
                    'SAP cloud database tuning'
                ],
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 9,
                'meta_title' => 'SAP Solutions Integration Services',
                'meta_description' => 'S/4HANA & SAP Business one integration and support.'
            ],
            [
                'title' => 'Consulting Services for SAP Solutions',
                'slug' => 'sap-consulting',
                'short_description' => 'Consulting Services for SAP Solutions.',
                'description' => 'Providing professional consulting services, technical audits, configuration optimization, and training for SAP Solutions.',
                'capabilities' => [
                    'SAP roadmap feasibility',
                    'Integration security checks',
                    'SAP version migration checks',
                    'Database query reviews',
                    'Custom SAP user guides'
                ],
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 10,
                'meta_title' => 'Consulting Services for SAP Solutions',
                'meta_description' => 'Enterprise advisory and audits for SAP S/4HANA configurations.'
            ],
            [
                'title' => 'Custom Development',
                'slug' => 'custom-development',
                'short_description' => 'Custom Development.',
                'description' => 'High-performance bespoke software development services, custom business portals, ERP extensions, and API integrations.',
                'capabilities' => [
                    'Custom middleware coding',
                    'Multi-tenant DB setups',
                    'Mobile app coding loops',
                    'Secured payment systems',
                    'Corporate intranet designs'
                ],
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 11,
                'meta_title' => 'Bespoke Custom Software Development',
                'meta_description' => 'Custom software development matching unique organizational flows.'
            ],
            [
                'title' => 'DCC Cloud Services',
                'slug' => 'dcc-cloud-services',
                'short_description' => 'DCC Cloud Services.',
                'description' => 'High-availability secure enterprise cloud hosting, cloud migrations, database clustering, and virtualized system environments.',
                'capabilities' => [
                    'High availability hosting',
                    'Hybrid cloud bridge setups',
                    'SQL database replication',
                    'Elastic scaling profiles',
                    'Hourly security image saves'
                ],
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cloud"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path></svg>',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 12,
                'meta_title' => 'DCC Cloud Hosting & Infrastructure',
                'meta_description' => 'Redundant and high performance enterprise cloud computing services.'
            ]
        ];

        foreach ($services as $svc) {
            Service::updateOrCreate(['slug' => $svc['slug']], $svc);
        }
    }
}
