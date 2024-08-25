<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create([
            'user_type' => 'employer',
        ]);
        User::factory()->count(10)->create([
            'user_type' => 'candidate',
        ]);
        User::factory()->count(10)->create([
            'user_type' => 'admin',
        ]);
    }
}
