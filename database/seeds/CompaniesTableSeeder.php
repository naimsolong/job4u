<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Employer;
use App\Company;
use App\JobCategory;
use App\CompanyType;
use App\CompanySize;

class CompaniesTableSeeder extends Seeder
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
        $faker->addProvider(new Faker\Provider\ms_MY\Payment($faker));
    	$faker->addProvider(new Faker\Provider\ms_MY\Company($faker));

    	$jobCategory = JobCategory::pluck('name')->all();
    	$companyType = CompanyType::pluck('name')->all();
    	$companySize = CompanySize::pluck('name')->all();

    	$employers = Employer::all();

    	foreach ($employers as $employer) {
    		$employer->company()->create([
    			'name' => $faker->companyName,
                'ssm' => $faker->swiftCode,
                'job_category' => $faker->randomElement($jobCategory),
    			'company_type' => $faker->randomElement($companyType),
    			'company_size' => $faker->randomElement($companySize),
    			'about_us' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
    			'address_1' => $faker->buildingPrefix . $faker->buildingNumber . " " . $faker->streetName,
	            'address_2' => $faker->township,
	            'city' => $faker->city,
	            'postal' => $faker->postcode,
	            'state' => $faker->state,
	            'country' => 'Malaysia',
    			'dress_code' => $faker->randomElement($array = array('Smart Casual', 'Formal Dress', null)),
    			'work_days' => $faker->randomElement($array = array('Sun to Thu', 'Mon to Fri')),
    			'work_hours' => $faker->randomElement($array = array('8AM to 5PM', '9AM to 6PM')),
    			'website_url' => $faker->url,
                'verification' => $faker->numberBetween($min = 0, $max = 1),
    			'profile_view' => $faker->numberBetween($min = 10, $max = 50),
    		]);
    	}
    }
}
