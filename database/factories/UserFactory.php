<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Default password for all users
            'remember_token' => Str::random(10),
            'user_type' => $this->faker->randomElement(['admin', 'candidate', 'employer']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
