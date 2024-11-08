<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Property::factory()
            ->has(Address::factory())
            ->count(10)
            ->create();
    }
}
