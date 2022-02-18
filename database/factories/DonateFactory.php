<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donate>
 */
class DonateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'donor' => $this->faker->name(),
            'purpose' => $this->faker->randomElement(['church', 'cemetery']),
            'memoriam' => $this->faker->sentence(),
            'amount' => $this->faker->randomFloat(2, 1, 100)
        ];
    }
}
