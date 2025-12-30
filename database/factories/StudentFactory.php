<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'paid_this_month' => $this->faker->boolean(),
            'old_due' => $this->faker->numberBetween(0, 1000),
            'qr_code' => $this->faker->uuid(),
        ];
    }
}
