<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\User;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'property_id' => Property::inRandomOrder()->first()->id, // Use an existing Property
            'rating' => $this->faker->numberBetween(1, 5),
            'review' => $this->faker->text(200),
        ];
    }
}
