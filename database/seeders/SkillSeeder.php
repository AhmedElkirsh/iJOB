<?php

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::create(['name' => 'JavaScript']);
        Skill::create(['name' => 'PHP']);
        Skill::create(['name' => 'Laravel']);
        Skill::create(['name' => 'CSS']);
        Skill::create(['name' => 'Nodejs']);
        Skill::create(['name' => 'React']);
        Skill::create(['name' => 'Vue.js']);
        Skill::create(['name' => 'Python']);
        Skill::create(['name' => 'Django']);
        Skill::create(['name' => 'SQL']);
        Skill::create(['name' => 'NoSQL']);
        Skill::create(['name' => 'AWS']);
        Skill::create(['name' => 'Docker']);
        Skill::create(['name' => 'Git']);
        Skill::create(['name' => 'WordPress']);
        Skill::create(['name' => 'JQuery']);
        Skill::create(['name' => 'Bootstrap']);
        Skill::create(['name' => 'Tailwind CSS']);
        Skill::create(['name' => 'Tailwind UI']);
        Skill::create(['name' => 'SASS']);
        Skill::create(['name' => 'Apache']);
        Skill::create(['name' => 'mysql']);
    }
}
