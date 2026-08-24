<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Show the products directory.
     */
    public function index()
    {
        $softwareProducts = [
            [
                'title' => 'Smart Sale',
                'description' => 'A cloud-first retail management and POS platform offering real-time sales telemetry, offline sales buffer sync, barcoding, and automated billing.',
                'features' => ['Offline Sales Buffer Sync', 'Barcode Scanner Compatibility', 'Mobile Money Payment Links', 'Live Profitability Reports'],
                'icon' => '<svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>',
                'image' => 'images/products/smart-sale.jpg'
            ],
            [
                'title' => 'Employee Reference Bureau',
                'description' => 'A secure verification registry built on zero-trust architectures, allowing certified institutions to conduct authenticated background history checks.',
                'features' => ['Zero-Trust Credentials Registry', 'Background History Verification', 'Authenticated API Checks', 'Automated Clearance Audits'],
                'icon' => '<svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>',
                'image' => 'images/products/erb.jpg'
            ],
            [
                'title' => 'Team Track',
                'description' => 'An interactive field service portal combining GPS telemetry tracking, automated routing, and mobile offline task reports to boost SLA compliance.',
                'features' => ['GPS Live Telemetry Tracking', 'Automated Dispatch Routing', 'Mobile Offline Task Reports', 'Real-Time SLA Dashboards'],
                'icon' => '<svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>',
                'image' => 'images/products/team-track.jpg'
            ],
            [
                'title' => 'Reliance Home',
                'description' => 'A premium real estate, property management and automation platform designed to simplify tenancy tracking, rent collection, and smart energy monitoring.',
                'features' => ['Tenancy Contract Logs', 'Digital Rent Collection', 'Smart Energy Grid Sync', 'Automated Billing Alerts'],
                'icon' => '<svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>',
                'image' => 'images/products/reliance-home.jpg'
            ],
            [
                'title' => 'Ajira Market',
                'description' => 'A high-throughput recruitment portal featuring real-time verification APIs, resume indexing engines, and recruiter dashboards.',
                'features' => ['Candidate Verification APIs', 'Resume Indexing Engine', 'Custom Recruiter Dashboards', 'Job SLA Metrics Analytics'],
                'icon' => '<svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>',
                'image' => 'images/products/ajira-market.jpg'
            ]
        ];

        $hardwareProducts = [
            [
                'title' => 'Dell Latitude 5440 Business Laptop',
                'description' => 'A premium 14-inch commercial laptop built for corporate workflows, featuring high-speed DDR5 memory, biometric login, and long-lasting battery life.',
                'price' => 'TZS 2,400,000',
                'specs' => ['Intel Core i7-1355U (Up to 5.0 GHz)', '16GB DDR5 4800MHz RAM', '512GB NVMe PCIe M.2 SSD', '14.0" FHD (1920x1080) Anti-Glare', 'Windows 11 Professional 64-Bit'],
                'icon' => '<svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>',
                'image' => 'images/services/software-development.jpg'
            ],
            [
                'title' => 'HP LaserJet Pro M404dn Enterprise Printer',
                'description' => 'An energy-efficient, high-speed monochrome office printer with strong built-in security protocols to block external network threats.',
                'price' => 'TZS 850,000',
                'specs' => ['Print speed up to 40 pages per minute', 'Automatic double-sided (duplex) printing', 'Gigabit Ethernet & USB Connectivity', 'PIN/Pull printing via secure control panel'],
                'icon' => '<svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h6z"/></svg>',
                'image' => 'images/services/sap-consulting.jpg'
            ],
            [
                'title' => 'Samsung Galaxy S24 Ultra Smartphone',
                'description' => 'The ultimate mobile productivity device featuring an integrated S Pen, elite camera optics, and real-time AI document translation tools.',
                'price' => 'TZS 3,200,000',
                'specs' => ['6.8" QHD+ Dynamic AMOLED 2X Display', 'Snapdragon 8 Gen 3 (4nm) Mobile Platform', '12GB LPDDR5X RAM / 512GB UFS 4.0 Storage', '200MP Quad Rear Camera with 100x Zoom', '5000mAh Battery with 45W Fast Charging'],
                'icon' => '<svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><path stroke-linecap="round" d="M12 18h.01"/></svg>',
                'image' => 'images/services/cybersecurity.jpg'
            ],
            [
                'title' => 'Epson EcoTank L3250 Multi-Function Printer',
                'description' => 'A cost-efficient, spill-free wireless ink tank printer designed for home offices and small business print, scan, and copy needs.',
                'price' => 'TZS 650,000',
                'specs' => ['Print, Scan, Copy & Wi-Fi Direct Support', 'Ultra-low cost printing (up to 90% savings)', 'Spill-free, error-free ink refilling system', 'Epson Smart Panel mobile app control'],
                'icon' => '<svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h6z"/></svg>',
                'image' => 'images/services/ict-infrastructure.jpg'
            ],
            [
                'title' => 'Lenovo ThinkCentre M70q Tiny Computer',
                'description' => 'An ultra-compact desktop PC that delivers full-sized enterprise-grade performance while reclaiming valuable office desk space.',
                'price' => 'TZS 1,850,000',
                'specs' => ['Intel Core i5-12400T Hexa-Core Processor', '8GB DDR4 RAM (Expandable to 64GB)', '256GB NVMe M.2 Solid State Drive', 'Wi-Fi 6 + Bluetooth 5.1 & RJ-45 LAN', 'VESA mount compatible miniature design'],
                'icon' => '<svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>',
                'image' => 'images/services/cloud-services.jpg'
            ]
        ];

        return view('frontend.products.index', compact('softwareProducts', 'hardwareProducts'));
    }
}
