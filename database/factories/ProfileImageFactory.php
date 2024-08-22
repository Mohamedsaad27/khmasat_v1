<?php

namespace Database\Factories;

use App\Models\ProfileImage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProfileImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),  // Creates a user if one doesn't exist
            'profile_picture' => $this->faker->imageUrl(640, 480, 'people', true, 'Profile Pic'),  // Generate a random image URL
        ];
    }
}
