<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Education;
use App\EducationLevel;
use App\EducationQualificationLevel;


class EducationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Educator($faker));

        // $educationLevel = array(
        // 	'Primary/Secondary School/SPM/\'O\' Level',
        // 	'Higher Secondary/STPM/\'A\' Level/Pre-U',
        // 	'Professional Certificate',
        // 	'Diploma',
        // 	'Advanced/Higher/Graduate Diploma',
        // 	'Bachelor\'s Degree',
        // 	'Post Graduate Diploma',
        // 	'Professional Degree',
        // 	'Master\'s Degree',
        // 	'Doctorate (PhD)',
        // );

        $educationLevel = EducationLevel::pluck('name')->all();

        // $qualificationLevel = array(
        // 	'First Class',
        // 	'Second Class Upper',
        // 	'Second Class Lower',
        // 	'Third Class',
        // 	'Incomplete',
        // );

        $qualificationLevel = EducationQualificationLevel::pluck('name')->all();

        foreach (range(1, 3) as $index) {
        	Education::create([
        		'alumni_id' => $index,
        		'major' => $faker->course,
        		'education_level' => $faker->randomElement($educationLevel),
        		'institution' => $faker->university,
        		'qualification_level' => $faker->randomElement($qualificationLevel),
                'graduate_month' => $faker->monthName,
        		'graduate_year' => $faker->year($max = 'now'),
        	]);
        }

        foreach (range(4, 20) as $index) {
        	Education::create([
        		'alumni_id' => $faker->biasedNumberBetween($min = 1, $max = 10),
        		'major' => $faker->course,
        		'education_level' => $faker->randomElement($educationLevel),
        		'institution' => $faker->university,
        		'qualification_level' => $faker->randomElement($qualificationLevel),
                'graduate_month' => $faker->monthName,
                'graduate_year' => $faker->year($max = 'now'),
        	]);
        }
    }
}
