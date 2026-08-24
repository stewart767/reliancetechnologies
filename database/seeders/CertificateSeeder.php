<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $certificates = [
            [
                'title' => 'Cisco Select Partner',
                'authority' => 'Cisco ID Verified',
                'description' => 'Authorized to configure, design, and deploy Cisco Enterprise Network Architectures, routing matrixes, firewalls, and SD-WAN endpoints in regional corporate environments.',
                'edition_year' => '2026 Edition',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'ISO/IEC 27001 Compliance',
                'authority' => 'Audit Framework',
                'description' => 'Our database operations, system management codes, and cybersecurity teams follow the ISO/IEC 27001 Information Security Management Systems framework parameters.',
                'edition_year' => 'ISMS standard',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Microsoft Solutions Partner',
                'authority' => 'Partner Status',
                'description' => 'Certified in Azure Cloud Solutions, Active Directory configurations, enterprise email setups, and hybrid cloud migrations for medium and large organizational tenants.',
                'edition_year' => 'Azure certified',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1V5zm10 0a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 15a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1v-4zm10 0a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z"></path></svg>',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Siemon Certified Installer',
                'authority' => 'Structural Cabling',
                'description' => 'Authorized structured cabling installer for Siemon copper and fiber solutions. Entitles clients to Siemon\'s comprehensive 20-year structural network warranty.',
                'edition_year' => '20-yr Warranty Eligible',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'E-Mobility Innovation Award',
                'authority' => 'Green Tech Award',
                'description' => 'Received recognition for our commercial electric tricycle fleets (YAOYAO Energies) and smart solar battery swap station telemetry at the East Africa Green Tech Exhibition.',
                'edition_year' => 'Exhibition Winner',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5a2 2 0 10-2 2h2zm0 0h4m-4 0H8m12 3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'TCRA Technical License',
                'authority' => 'Regulatory Body',
                'description' => 'Fully licensed and certified by the Tanzania Communications Regulatory Authority (TCRA) to import, install, configure, and service electronic communication and network hardware.',
                'edition_year' => 'TCRA Authorized',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>',
                'sort_order' => 6,
                'is_active' => true,
            ]
        ];

        foreach ($certificates as $cert) {
            Certificate::updateOrCreate(['title' => $cert['title']], $cert);
        }
    }
}
