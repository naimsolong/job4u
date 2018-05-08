<?php

use Illuminate\Database\Seeder;

use App\Alumni;
use App\Employer;
use App\Job;

use App\Application;
use App\LogApplication;

class AddApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	$faker = Faker\Factory::create();
        $faker->addProvider(new Faker\Provider\ms_MY\Address($faker));

        $alumnis = Alumni::all();
        $count_a = Alumni::count();
        $jobs = Job::all()->whereIn('availability', [1, 2]);

            foreach ($jobs as $job) {

            	$application = Application::create([
            		'alumni_id' => $faker->numberBetween($min = 1, $max = $count_a),
            		'employer_id' => 2,
            		'job_id' => $job->id,
            		'status' => 1,
            	]);

                LogApplication::create([
                    'application_id' => $application->id,
                    'status' => 1,
                    'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                ]);
            }
    }
}
