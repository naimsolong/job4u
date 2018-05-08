<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Language;
use App\Proficiency;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $languages = array(
        	'Melayu', 'Cina', 'India', 'Inggeris',
        );

        // $proficiency = array(
        // 	'Advance', 'Intermediate', 'Beginner',
        // );
        
        $proficiency = Proficiency::pluck('name')->all();

        foreach (range(1, 3) as $index) {
        	Language::create([
        		'alumni_id' => $index,
        		'name' => $faker->randomElement($languages),
        		'proficiency' => $faker->randomElement($proficiency),
        	]);
        }

        foreach (range(4, 20) as $index) {
        	Language::create([
        		'alumni_id' => $faker->biasedNumberBetween($min = 1, $max = 10),
        		'name' => $faker->randomElement($languages),
        		'proficiency' => $faker->randomElement($proficiency),
        	]);
        }
    }
}
