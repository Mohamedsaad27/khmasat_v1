<?php

namespace Database\Seeders;

use App\Models\PropertyType;
use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $propertyTypes = [
            ['name' => 'شقة', 'slug' => 'apartment'],
            ['name' => 'فيلا', 'slug' => 'villa'],
            ['name' => 'شاليه', 'slug' => 'chalet'],
            ['name' => 'مكتب', 'slug' => 'office'],
            ['name' => 'محل', 'slug' => 'shop'],
            // Add more property types as needed
        ];

        foreach ($propertyTypes as $type) {
            PropertyType::create($type);
        }
    }
}

