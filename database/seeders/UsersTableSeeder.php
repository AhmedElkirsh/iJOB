<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(3)->state(['user_type' => 'admin'])->create();
        User::factory()->count(3)->state(['user_type' => 'candidate'])->create();
        User::factory()->count(5)->state(['user_type' => 'employer'])->create();
    }
}

