<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employer;

class EmployerSeeder extends Seeder
{
    public function run()
    {
        // Create employers for the existing users with 'employer' type
        Employer::factory()->count(5)->create();
    }
}
