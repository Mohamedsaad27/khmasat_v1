<?php

namespace Database\Seeders;

use App\Models\PropertyBenefit;
use Illuminate\Database\Seeder;

class PropertyBenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 30 property benefits
        PropertyBenefit::factory()->count(10)->create();
    }
}
