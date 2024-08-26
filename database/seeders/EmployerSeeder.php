<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employer;

class EmployerSeeder extends Seeder
{
    public function run()
    {
        Employer::factory()->count(5)->create();
    }
}
