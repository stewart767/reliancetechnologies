<?php

namespace Database\Seeders;

use App\Models\Leader;
use Illuminate\Database\Seeder;

class LeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $leaders = [
            [
                'name' => 'Joseph Lyimo',
                'role' => 'Founder & Managing Director',
                'bio' => 'With over 18 years of executive management experience in regional ICT distribution and telecommunications integration, Joseph oversees corporate growth, board alignments, and government relations.',
                'experience_years' => 18,
                'location' => 'Dar es Salaam',
                'avatar' => null,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Dr. Ahmed Mbarouk',
                'role' => 'Chief Technology Officer',
                'bio' => 'Ahmed manages our system engineering teams and API developers. He holds a Ph.D. in Computer Science and specializes in enterprise software pipelines, complex middleware, and databases.',
                'experience_years' => 10,
                'location' => 'B2B Systems',
                'avatar' => null,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Elizabeth Mlay',
                'role' => 'Head of Cybersecurity & Audits',
                'bio' => 'Elizabeth leads security vulnerability management, penetration testing, and zero-trust deployments. She holds CISM and CISSP certifications with extensive background in financial security integrations.',
                'experience_years' => 12,
                'location' => 'Threat Intelligence',
                'avatar' => null,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Emmanuel Mwakalindile',
                'role' => 'Operations & E-Mobility Manager',
                'bio' => 'Emmanuel oversees field operations, structured physical networks installations, and the YAOYAO Energies commercial electric fleet deployments, managing battery swap telemetry networks.',
                'experience_years' => 8,
                'location' => 'E-Mobility Logistics',
                'avatar' => null,
                'sort_order' => 4,
                'is_active' => true,
            ]
        ];

        foreach ($leaders as $leader) {
            Leader::updateOrCreate(['name' => $leader['name']], $leader);
        }
    }
}
