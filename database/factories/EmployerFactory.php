<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employer;
use App\Models\User;

class EmployerFactory extends Factory
{
    protected $model = Employer::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Creates a new User record and associates it
            'name' => $this->faker->company,
            'employer_type' => $this->faker->randomElement(['company', 'individual', 'non-profit']),
            'location' => $this->faker->address,
            'website_url' => $this->faker->optional()->url,
            'bio' => $this->faker->optional()->paragraph,
        ];
    }
}
