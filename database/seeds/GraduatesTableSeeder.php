<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Alumni;
use App\Education;
use App\Faculty;
use App\Graduate;

class GraduatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $faker->addProvider(new \Faker\Provider\pl_PL\Person($faker));

        $faculties = Faculty::pluck('name')->all();

        $alumnis = Alumni::all();

        foreach($alumnis as $alumni) {
        	
        	$education = $alumni->educations->sortByDesc('graduate_year')->first();

        	$graduate = new Graduate;

        	$graduate->degree_type = $education->education_level;
        	$graduate->course_name = $education->major;
        	$graduate->faculty = $faker->randomElement($faculties);
        	$graduate->matric_no = $faker->personalIdentityNumber;
        	$graduate->graduate_month = $education->graduate_month;
        	$graduate->graduate_year = $education->graduate_year;

        	$alumni->graduate()->save($graduate);
        }
    }
}
