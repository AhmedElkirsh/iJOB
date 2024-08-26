<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployerFactory extends Factory
{
    protected $model = Employer::class;
    
    // Static array to keep track of used user_ids
    protected static $usedUserIds = [];

    public function definition()
    {
        // Fetch a random user with user_type 'employer' that hasn't been used yet
        $employerUser = User::where('user_type', 'employer')
            ->whereNotIn('id', self::$usedUserIds)
            ->inRandomOrder()
            ->first();

        if (!$employerUser) {
            throw new \Exception("No available 'employer' type users left to assign.");
        }

        // Add the selected user_id to the used list
        self::$usedUserIds[] = $employerUser->id;

        return [
            'user_id' => $employerUser->id, // Use the existing user's ID as the primary key
            'name' => $employerUser->name,
            'employer_type' => $this->faker->randomElement(['company', 'individual', 'non-profit']),
            'location' => $this->faker->city . ', ' . $this->faker->state,
            'website_url' => $this->faker->url,
            'bio' => $this->faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}