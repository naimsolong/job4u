<?php

use Illuminate\Database\Seeder;

use App\Alumni;
use App\Employer;
use App\Job;

use App\Application;

use App\LogApplication;

class ApplicationsTableSeeder extends Seeder
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

        for($i = 0; $i < 20; $i++) {
            foreach ($jobs as $job) {
                $status = $faker->numberBetween($min = 1, $max = 6);
                $last_seen = null;
                $shortlist_datetime = null;
                $interview_datetime = null;
                $interview_location = null;
                $hire_reject_datetime = null;

                switch ($status) {
                    case 2:
                        $shortlist_datetime = $faker->dateTimeBetween($startDate = '-10 years', $endDate = 'now');
                        $last_seen = date_format($faker->dateTimeBetween($startDate = '-10 years', $endDate = $shortlist_datetime), 'Y-m-d');
                        break;

                    case 3 || 4:
                        $shortlist_datetime = $faker->dateTimeBetween($startDate = '-10 years', $endDate = 'now');
                        $interview_datetime = $faker->dateTimeBetween($startDate = '-10 years', $endDate = $shortlist_datetime);
                        $interview_location =  $faker->buildingPrefix . $faker->buildingNumber;
                        $last_seen = date_format($faker->dateTimeBetween($startDate = '-10 years', $endDate = $interview_datetime), 'Y-m-d');
                        break;

                    case 5 || 6:
                        $shortlist_datetime = $faker->dateTimeBetween($startDate = '-10 years', $endDate = 'now');
                        $interview_datetime = $faker->dateTimeBetween($startDate = '-10 years', $endDate = $shortlist_datetime);
                        $interview_location =  $faker->buildingPrefix . $faker->buildingNumber;
                        $hire_reject_datetime = $faker->dateTimeBetween($startDate = '-10 years', $endDate = $interview_datetime);
                        $last_seen = date_format($faker->dateTimeBetween($startDate = '-10 years', $endDate = $hire_reject_datetime), 'Y-m-d');
                        break;
                    
                    default:                        
                        break;
                }

                if($job->availability != 0) {
                	$application = Application::create([
                		'alumni_id' => $faker->numberBetween($min = 1, $max = $count_a),
                		'employer_id' => $job->employer_id,
                		'job_id' => $job->id,
                		'status' => $status,
                		'last_seen' => $last_seen,
                        'remarks' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                        'shortlist_datetime' => $shortlist_datetime,
                        'interview_datetime' => $interview_datetime,
                        'interview_location' => $interview_location,
                        'hire_reject_datetime' => $hire_reject_datetime,
                	]);

                    LogApplication::create([
                        'application_id' => $application->id,
                        'status' => $status,
                        'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                    ]);
                }
            }
        }
    }
}
