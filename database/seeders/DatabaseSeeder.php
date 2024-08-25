<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Resume;
use App\Models\ResumeEducation;
use App\Models\ResumeExperience;
use App\Models\ResumeProjects;
use App\Models\ResumeSkills;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employer;
use App\Models\Job;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // $this->call(UserSeeder::class);

        // // Then seed the employers
        // $this->call(EmployerSeeder::class);

        // // Finally, seed the job listings
        // $this->call(JobSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EmployerSeeder::class);
        $this->call(JobSeeder::class);

    }
}
