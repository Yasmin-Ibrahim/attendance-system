<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parents>
 */
class ParentsFactory extends Factory
{

    public function definition(): array
    {
        return [
            "student_id" => Student::factory(),
            "parent_first" => $this->faker->name(),
            "type1" => $this->faker->randomElement(['father','mother','g_father','g_mother','sister','brother', 'uncle','aunt','friend']),
            "phone_first" => $this->faker->phoneNumber(),
            "parent_second" => $this->faker->optional()->name(),
            "type2" => $this->faker->optional()->randomElement(['father','mother','g_father','g_mother','sister','brother', 'uncle','aunt','friend']),
            "phone_second" => $this->faker->optional()->phoneNumber(),
            "message" => $this->faker->optional()->sentence(),
        ];
    }
}
