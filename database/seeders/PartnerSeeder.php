<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partners = [
            [
                'name' => 'TATOA',
                'logo' => 'images/partners/tatoa.svg',
                'website' => 'https://www.tatoa.co.tz',
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'name' => 'Kenya Transporters Association',
                'logo' => 'images/partners/kta.svg',
                'website' => 'https://www.kta.co.ke',
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'name' => 'KIFWA',
                'logo' => 'images/partners/kifwa.svg',
                'website' => 'https://kifwa.co.ke',
                'is_active' => true,
                'sort_order' => 3
            ],
            [
                'name' => 'TAZ Group',
                'logo' => 'images/partners/taz.svg',
                'website' => null,
                'is_active' => true,
                'sort_order' => 4
            ],
            [
                'name' => 'UFFA',
                'logo' => 'images/partners/uffa.svg',
                'website' => 'https://uffa.or.ug',
                'is_active' => true,
                'sort_order' => 5
            ],
            [
                'name' => 'SAFA Logistics',
                'logo' => 'images/partners/safa.svg',
                'website' => null,
                'is_active' => true,
                'sort_order' => 6
            ],
            [
                'name' => 'Southern African Transport Conference',
                'logo' => 'images/partners/southern_transport.svg',
                'website' => 'https://www.satc.org.za',
                'is_active' => true,
                'sort_order' => 7
            ],
            [
                'name' => 'SAHHA',
                'logo' => 'images/partners/sahha.svg',
                'website' => 'https://www.sahha.co.za',
                'is_active' => true,
                'sort_order' => 8
            ],
            [
                'name' => 'Land-linked Zambia',
                'logo' => 'images/partners/zambia.svg',
                'website' => null,
                'is_active' => true,
                'sort_order' => 9
            ]
        ];

        foreach ($partners as $part) {
            Partner::updateOrCreate(['name' => $part['name']], $part);
        }
    }
}
