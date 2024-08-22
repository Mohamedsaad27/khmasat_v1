<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\Category;
use App\Models\User;
use App\Models\PropertyType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence;

        return [
            'category_id' => Category::factory(),
            'user_id' => User::factory(),
            'type_id' => PropertyType::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10000, 1000000),
            'status' => $this->faker->randomElement(['available', 'sold', 'rented']),
            'furnished' => $this->faker->boolean,
        ];
    }
}
