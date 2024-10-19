<?php

namespace Database\Seeders;

use App\Models\Benefit;
use Illuminate\Database\Seeder;

class BenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $benefits = [
            ['name' => 'حمام سباحة', 'slug' => 'swimming-pool'], // Swimming Pool
            ['name' => 'جيم', 'slug' => 'gym'],                 // Gym
            ['name' => 'ساونا', 'slug' => 'sauna'],             // Sauna
            ['name' => 'موقف سيارات', 'slug' => 'parking'],      // Parking
            ['name' => 'نادي صحي', 'slug' => 'health-club'],     // Health Club
            // Add more benefits/amenities as needed
        ];

        foreach ($benefits as $benefit) {
            Benefit::create($benefit);
        }
    }
}

