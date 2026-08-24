<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Joseph Kahama',
                'company' => 'Kikwetu Microfinance',
                'position' => 'Chief Operations Officer',
                'testimonial' => 'Reliance designed a custom database sync API that completely resolved our double data entry headaches. Our portals sync in real-time now.',
                'image' => null,
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'client_name' => 'Fatma Said',
                'company' => 'East Coast Logistics',
                'position' => 'Logistics Director',
                'testimonial' => 'The YAOYAO electric tricycles combined with their telemetry tracking portal transformed our last-mile deliveries. Highly recommend their engineering team.',
                'image' => null,
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'client_name' => 'Dr. Andrew Ndosi',
                'company' => 'Amana Medical Center',
                'position' => 'ICT Director',
                'testimonial' => 'Their zero-trust network audit and upgrade protected our patient data directories and ensured we meet local privacy standards.',
                'image' => null,
                'is_active' => true,
                'sort_order' => 3
            ]
        ];

        foreach ($testimonials as $test) {
            Testimonial::updateOrCreate(['client_name' => $test['client_name']], $test);
        }
    }
}
