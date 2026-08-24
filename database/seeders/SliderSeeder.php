<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::truncate();
        $slides = [
            [
                'title' => 'Technology That Moves Your Business.',
                'description' => 'Innovative ICT, software, and systems integration designed to scale.',
                'background_image' => 'images/hero/hero-bg.jpg',
                'primary_cta_text' => 'Talk to an Expert',
                'primary_cta_url' => '/contact',
                'secondary_cta_text' => 'Explore Solutions',
                'secondary_cta_url' => '#solutions',
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'title' => 'Secure Enterprise Software Platforms.',
                'description' => 'Custom databases, APIs, and cloud systems engineered for data protection and high performance.',
                'background_image' => 'images/hero/hero-bg-2.jpg',
                'primary_cta_text' => 'Request Consultation',
                'primary_cta_url' => '/contact',
                'secondary_cta_text' => 'Our Services',
                'secondary_cta_url' => '/services',
                'sort_order' => 2,
                'is_active' => true
            ],
            [
                'title' => 'Cybersecurity & Network Cabling.',
                'description' => 'Zero-trust firewalls, structured network cabling, and server monitoring designed for corporate compliance.',
                'background_image' => 'images/hero/hero-bg-3.jpg',
                'primary_cta_text' => 'Secure Your System',
                'primary_cta_url' => '/contact',
                'secondary_cta_text' => 'Read Case Studies',
                'secondary_cta_url' => '/projects',
                'sort_order' => 3,
                'is_active' => true
            ]
        ];

        foreach ($slides as $slide) {
            Slider::create($slide);
        }
    }
}
