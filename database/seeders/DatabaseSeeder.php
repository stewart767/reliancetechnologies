<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Default Admin User
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@reliancesolutions.co.tz'],
            [
                'name' => 'Reliance Administrator',
                'password' => \Illuminate\Support\Facades\Hash::make('Password123'),
                'email_verified_at' => now(),
            ]
        );

        // Seed content entities
        $this->call([
            CompanySettingSeeder::class,
            ServiceSeeder::class,
            SolutionSeeder::class,
            IndustrySeeder::class,
            ProjectSeeder::class,
            FaqSeeder::class,
            CategoryPostSeeder::class,
            TestimonialSeeder::class,
            PartnerSeeder::class,
            LeaderSeeder::class,
            CertificateSeeder::class,
            YaoyaoSpecSeeder::class,
            SliderSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
