<?php

namespace Database\Seeders;

use App\Models\PricingHistory;
use Illuminate\Database\Seeder;

class PricingHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 30 pricing history records
        PricingHistory::factory()->count(30)->create();
    }
}
