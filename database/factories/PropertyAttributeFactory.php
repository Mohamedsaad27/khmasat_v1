<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\Attribute;
use App\Models\PropertyAttribute;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyAttributeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PropertyAttribute::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'property_id' => Property::inRandomOrder()->first()->id, // Use an existing Property
            'attribute_name' => Attribute::factory(),  // Create an attribute and get the name
            'value' => $this->faker->word,  // Generate a random value
        ];
    }
}
