<?php

namespace Database\Factories;

use App\Models\Resume;
use App\Models\Application;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResumeFactory extends Factory
{
    protected $model = Resume::class;

    public function definition()
    {
        return [
            'application_id' => Application::factory(),
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'marital_status' => $this->faker->randomElement(['single', 'married']),
            'military_status' => $this->faker->optional()->randomElement(['completed', 'exempted', 'unknown']),
        ];
    }
}
