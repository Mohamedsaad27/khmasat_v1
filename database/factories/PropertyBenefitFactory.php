<?php

namespace Database\Factories;

use App\Models\PropertyBenefit;
use App\Models\Property;
use App\Models\Benefit;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyBenefitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PropertyBenefit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'property_id' => Property::factory(),
            'benefit_id' => Benefit::factory(),
        ];
    }
}
