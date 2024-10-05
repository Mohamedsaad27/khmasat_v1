<?php

namespace Database\Seeders;

use App\Models\ProfileImage;
use Illuminate\Database\Seeder;

class UserImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfileImage::factory()->count(10)->create();
    }
}
