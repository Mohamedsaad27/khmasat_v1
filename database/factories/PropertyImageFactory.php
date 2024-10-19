<?php

namespace Database\Factories;

use App\Models\PropertyImage;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PropertyImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'property_id' => Property::factory(),
            'image_path' => $this->faker->imageUrl(),  // Generate a fake image URL
            'is_main' => $this->faker->boolean,
        ];
    }
}
