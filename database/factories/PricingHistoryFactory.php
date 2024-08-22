<?php

namespace Database\Factories;

use App\Models\PricingHistory;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PricingHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PricingHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'property_id' => Property::inRandomOrder()->first()->id, // Use an existing Property
            'old_price' => $this->faker->randomFloat(2, 10000, 1000000),
            'new_price' => $this->faker->randomFloat(2, 10000, 1000000),
        ];
    }
}

