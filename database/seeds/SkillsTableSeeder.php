<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Skill;
use App\Proficiency;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $skills = array(
        	'Memasak', 'Melukis', 'Adobe', 'Microsoft', 'Programming', 'Mengira', 'Menulis',
        );

        // $proficiency = array(
        // 	'Advance', 'Intermediate', 'Beginner',
        // );

        $proficiency = Proficiency::pluck('name')->all();

        foreach (range(1, 3) as $index) {
        	Skill::create([
        		'alumni_id' => $index,
        		'name' => $faker->randomElement($skills),
        		'proficiency' => $faker->randomElement($proficiency),
        	]);
        }

        foreach (range(4, 20) as $index) {
        	Skill::create([
        		'alumni_id' => $faker->biasedNumberBetween($min = 1, $max = 10),
        		'name' => $faker->randomElement($skills),
        		'proficiency' => $faker->randomElement($proficiency),
        	]);
        }
    }
}
