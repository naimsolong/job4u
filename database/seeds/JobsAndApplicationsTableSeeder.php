<?php

use Illuminate\Database\Seeder;

use App\Alumni;
use App\Employer;
use App\Job;

use App\JobCategory;
use App\CompanyType;
use App\CompanySize;
use App\JobPositionLevel;

use App\Application;
use App\LogApplication;

class JobsAndApplicationsTableSeeder extends Seeder
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
    	$faker->addProvider(new Faker\Provider\ms_MY\Person($faker));
    	$faker->addProvider(new Faker\Provider\ms_MY\PhoneNumber($faker));
    	$faker->addProvider(new Faker\Provider\ms_MY\Company($faker));
        $fakerUS = Faker\Factory::create();
        $fakerUS->addProvider(new Faker\Provider\en_US\Company($faker));

        $positionLevel = JobPositionLevel::pluck('name')->all();

    	$jobCategory = JobCategory::pluck('name')->all();
    	$companyType = CompanyType::pluck('name')->all();
    	$companySize = CompanySize::pluck('name')->all();


    	$employers = Employer::all();

    	foreach ($employers as $employer) {
    		$company_id = $employer->company->id;


	        $stop = rand(0,10);
	        
	        for($i = 0; $i < $stop; $i++) {
                $employer->jobs()->create([
                    'company_id' => $company_id,
                    'title' => $fakerUS->jobTitle,
                    'position_level' => $faker->randomElement($positionLevel),
                    'job_category' => $faker->randomElement($jobCategory),
                    'location_city' => $faker->city,
                    'location_state' => $faker->state,
                    'salary_min' => $faker->numberBetween($min = 10, $max = 5000),
                    'salary_max' => $faker->numberBetween($min = 5000, $max = 10000),
                    'requirements' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
                    'responsibilities' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
                    'benefits' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
                    'descriptions' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
                    'availability' => $faker->numberBetween($min = 0, $max = 2),
                    'job_view' => $faker->numberBetween($min = 10, $max = 1000),
                ]);
        	}
        }




        

        $alumnis = Alumni::all();
        $count_a = Alumni::count();
        $jobs = Job::all()->whereIn('availability', [1, 2]);

        foreach ($jobs as $job) {

	        $stop = rand(0,20);
	        
	        for($i = 0; $i < $stop; $i++) {
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
                    'created_at' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),
            	]);

                LogApplication::create([
                    'application_id' => $application->id,
                    'status' => $status,
                    'created_at' => $application->created_at,
                ]);
            }
        }
    }
}
