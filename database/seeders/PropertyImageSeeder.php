<?php

namespace Database\Seeders;

use App\Models\PropertyImage;
use Illuminate\Database\Seeder;

class PropertyImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 50 property images
        PropertyImage::factory()->count(50)->create();
    }
}
