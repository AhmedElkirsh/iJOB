<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Job;
use App\Models\Employer;

class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition()
    {
        return [
            'employer_id' => Employer::factory(), // Creates a new Employer record and associates it
            'position_title' => $this->faker->jobTitle,
            'employment_type' => $this->faker->randomElement(['full-time', 'part-time', 'contract', 'freelance', 'internship']),
            'experience level' => $this->faker->randomElement(['Junior', 'Senior', 'Expert']),
            'industry' => $this->faker->word,
            'job_description' => $this->faker->paragraph,
            'location' => $this->faker->city,
            'job_status' => $this->faker->randomElement(['not_approved', 'open', 'closed']),
            'salary' => $this->faker->numberBetween(30000, 120000), // Adjust salary range as needed
        ];
    }
}
