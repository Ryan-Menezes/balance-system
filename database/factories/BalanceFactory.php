<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BalanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'amount' => $this->faker->numberBetween(1000, 600000),
        ];
    }
}
