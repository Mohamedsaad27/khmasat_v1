<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PropertyAttribute;

class PropertyAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PropertyAttribute::factory()->count(100)->create();  // Adjust count based on your needs
    }
}
