<?php

namespace Database\Seeders;

use App\Models\YaoyaoSpec;
use Illuminate\Database\Seeder;

class YaoyaoSpecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specs = [
            // General Specifications
            [
                'group' => 'General Specifications',
                'key' => 'Vehicle Class',
                'value' => 'Heavy-Duty Commercial Cargo Electric Tricycle',
                'sort_order' => 1,
            ],
            [
                'group' => 'General Specifications',
                'key' => 'Drive Mode',
                'value' => 'Electric Motor Rear-Wheel Drive',
                'sort_order' => 2,
            ],
            [
                'group' => 'General Specifications',
                'key' => 'Operator Capacity',
                'value' => '1 Driver (Enclosed or Semi-enclosed cabin options available)',
                'sort_order' => 3,
            ],
            [
                'group' => 'General Specifications',
                'key' => 'Structure',
                'value' => 'Steel chassis designed for regional road conditions',
                'sort_order' => 4,
            ],

            // Performance Metrics
            [
                'group' => 'Performance Metrics',
                'key' => 'Average Range',
                'value' => '80km - 100km per full charge (depending on payload)',
                'sort_order' => 5,
            ],
            [
                'group' => 'Performance Metrics',
                'key' => 'Payload Capacity',
                'value' => '800 kg - 1000 kg operational limit',
                'sort_order' => 6,
            ],
            [
                'group' => 'Performance Metrics',
                'key' => 'Maximum Speed',
                'value' => '45 km/h electronic speed limited for safety',
                'sort_order' => 7,
            ],
            [
                'group' => 'Performance Metrics',
                'key' => 'Climbing Grade',
                'value' => 'Designed to handle typical urban and rural inclines',
                'sort_order' => 8,
            ],

            // Battery & Charging
            [
                'group' => 'Battery & Charging',
                'key' => 'Battery Technology',
                'value' => 'Lithium-Iron Phosphate (LiFePO4) or Lead-Acid options',
                'sort_order' => 9,
            ],
            [
                'group' => 'Battery & Charging',
                'key' => 'Battery Swapping',
                'value' => 'Supported for compatible commercial fleets',
                'sort_order' => 10,
            ],
            [
                'group' => 'Battery & Charging',
                'key' => 'Standard Charge Time',
                'value' => '6 - 8 hours via 220V standard utility line',
                'sort_order' => 11,
            ],
            [
                'group' => 'Battery & Charging',
                'key' => 'Input Voltage',
                'value' => 'Standard 220V grid charging compatible',
                'sort_order' => 12,
            ]
        ];

        foreach ($specs as $spec) {
            YaoyaoSpec::updateOrCreate(
                ['group' => $spec['group'], 'key' => $spec['key']],
                $spec
            );
        }
    }
}
