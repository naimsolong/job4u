<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Employer;
use App\Job;
use App\JobCategory;
use App\CompanyType;
use App\CompanySize;
use App\JobPositionLevel;

class JobsTableSeeder extends Seeder
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


        for($i = 0; $i < 5; $i++) {
        	foreach ($employers as $employer) {
        		$company_id = $employer->company->id;

                $employer->jobs()->create([
                    'company_id' => $company_id,
                    'title' => $fakerUS->jobTitle,
                    'position_level' => $faker->randomElement($positionLevel),
                    'job_category' => $faker->randomElement($jobCategory),
                    'location_city' => $faker->city,
                    'location_state' => $faker->state,
                    'salary_min' => $faker->numberBetween($min = 10, $max = 500),
                    'salary_max' => $faker->numberBetween($min = 500, $max = 2000),
                    'requirements' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
                    'responsibilities' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
                    'benefits' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
                    'descriptions' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
                    'availability' => $faker->numberBetween($min = 0, $max = 2),
                    'job_view' => $faker->numberBetween($min = 10, $max = 50),
                ]);
        	}
        }
    }
}
