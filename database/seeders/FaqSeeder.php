<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'How does Reliance combine hardware and software deployments?',
                'answer' => 'Our team features structured cabling technicians and software developers. When deploying an enterprise system, our network engineers set up local routers and server racks, while our developers build database integrations and customize dashboard interfaces, ensuring the physical infrastructure supports the digital tools.',
                'category' => 'General',
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'question' => 'Can you integrate our legacy database systems?',
                'answer' => 'Yes. We develop custom middleware, write APIs, and configure secure database synchronization processes to connect functional legacy platforms with modern web portals, avoiding the cost of replacing entire software systems.',
                'category' => 'General',
                'sort_order' => 2,
                'is_active' => true
            ],
            [
                'question' => 'What security standards do you apply?',
                'answer' => 'We follow Zero-Trust Network Access principles. This includes implementing identity and access management controls, configuring network boundary limits, encrypting data during transition, and setting up isolated backup systems.',
                'category' => 'Cybersecurity',
                'sort_order' => 3,
                'is_active' => true
            ],
            [
                'question' => 'How do electric tricycles compare to fuel-powered ones in cost?',
                'answer' => 'Electric tricycles have significantly lower energy costs per kilometer and fewer moving parts, which reduces maintenance expenses over the life of the vehicle.',
                'category' => 'YAOYAO Energies',
                'sort_order' => 4,
                'is_active' => true
            ],
            [
                'question' => 'Are custom cargo boxes available for electric tricycles?',
                'answer' => 'Yes, cargo boxes can be configured as dry freight boxes, flatbed loaders, open bins, or insulated units for temperature-sensitive deliveries.',
                'category' => 'YAOYAO Energies',
                'sort_order' => 5,
                'is_active' => true
            ]
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
