<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Alumni;
use App\Employer;
use App\EmployerType;

use App\Work;
use App\JobCategory;
use App\JobPositionLevel;

use App\Education;
use App\EducationLevel;
use App\EducationQualificationLevel;

use App\Skill;
use App\Language;
use App\Proficiency;

use App\Company;
use App\CompanyType;
use App\CompanySize;

class UserRandomRolesTableSeeder extends Seeder
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
        $faker->addProvider(new \Bezhanov\Faker\Provider\Educator($faker));

        $fakerUS = Faker\Factory::create();
        $fakerUS->addProvider(new Faker\Provider\en_US\Company($faker));

		$race = array('Malay', 'Chinese', 'Indian', 'Others');
		$religion = array('Islam', 'Christian', 'Hindu', 'Buddha', 'Others');
		$disability = array('Y', 'N');
		$marriage_status = array('Single', 'Married');
        $languages = array(
            'Melayu', 'Cina', 'India', 'Inggeris',
        );
        $skills = array(
            'Memasak', 'Melukis', 'Adobe', 'Microsoft', 'Programming', 'Mengira', 'Menulis',
        );
        
        $employer_type = EmployerType::pluck('name')->all();
        $positionLevel = JobPositionLevel::pluck('name')->all();

        $educationLevel = EducationLevel::pluck('name')->all();
        $qualificationLevel = EducationQualificationLevel::pluck('name')->all();

        $companyType = CompanyType::pluck('name')->all();
        $companySize = CompanySize::pluck('name')->all();
        $jobCategory = JobCategory::pluck('name')->all();

        $proficiency = Proficiency::pluck('name')->all();


        // Alumni Role

        // -------------------------------------------------------
        
        $birth = $faker->date($format = 'Y-m-d', $max = 'now');
        $myKad = date('ymd', strtotime($birth)) . $faker->randomNumber($nbDigits = 6, $strict = true);

    	$alumni = User::create([
            'firstname' => 'Abdul Salman',
            'lastname' => 'Ahmad Muis',
            'gender' => 'M',
    		'username' => 'abdsalman',
    		'email' => 'abdsalman@gmail.com',
            'role_id' => 5,
    		'password' => Hash::make('123456'),
    	])->alumni()->create([
            'identity_card' => $myKad,
            'birth_date' => $birth,
            'birth_state' => $faker->township,
            'race' => 'Indian',
            'religion' => $faker->randomElement($religion),
            'disability' =>  $faker->randomElement($disability),
            'marriage_status' => $faker->randomElement($marriage_status),
            'phone' => $faker->mobileNumber($countryCodePrefix = false, $hyphen = false),
            'address_1' => $faker->buildingPrefix . $faker->buildingNumber . " " . $faker->streetName,
            'address_2' => $faker->township,
            'city' => $faker->city,
            'postal' => $faker->postcode,
            'state' => $faker->state,
            'country' => 'Malaysia',
            'about_me' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
            'profile_view' => $faker->numberBetween($min = 10, $max = 50),
            'expected_salary' => $faker->numberBetween($min = 900, $max = 3000),
        ]);

        $end_duration = Carbon\Carbon::now();
        $stop = rand(0,4);
        
        for($i = 0; $i < $stop; $i++) {
            $end = $end_duration->format('Y');
            $start_duration = $end_duration->subYears(rand(4,8));
            $start = $start_duration->format('Y');

            $alumni->works()->create([
                'position_title' => $fakerUS->jobTitle,
                'position_level' => $faker->randomElement($positionLevel),
                'job_category' => $faker->randomElement($jobCategory),
                'company_name' => $faker->companyName,
                'start_duration' => $start,
                'end_duration' => $end,
                'salary' => $faker->randomNumber(5),
            ]);
        }

        $stop = rand(0,3);
        
        for($i = 0; $i < $stop; $i++) {
            $alumni->educations()->create([
                'major' => $faker->course,
                'education_level' => $faker->randomElement($educationLevel),
                'institution' => $faker->university,
                'qualification_level' => $faker->randomElement($qualificationLevel),
                'graduate_month' => $faker->monthName,
                'graduate_year' => $faker->year($max = 'now'),
            ]);
        }

        $stop = rand(0,4);
        
        for($i = 0; $i < $stop; $i++) {
            $alumni->languages()->create([
                'name' => $faker->randomElement($languages),
                'proficiency' => $faker->randomElement($proficiency),
            ]);
        }        
        for($i = 0; $i < $stop; $i++) {
            $alumni->skills()->create([
                'name' => $faker->randomElement($skills),
                'proficiency' => $faker->randomElement($proficiency),
            ]);
        }

        // -------------------------------------------------------
        
        $birth = $faker->date($format = 'Y-m-d', $max = 'now');
        $myKad = date('ymd', strtotime($birth)) . $faker->randomNumber($nbDigits = 6, $strict = true);

        $alumni = User::create([
            'firstname' => 'Amirul Naim',
            'lastname' => 'Mohd Solong',
            'gender' => 'M',
            'username' => 'naimteehee',
            'email' => 'naimteehee@gmail.com',
            'role_id' => 5,
            'password' => Hash::make('123456'),
        ])->alumni()->create([
            'identity_card' => $myKad,
            'birth_date' => $birth,
            'birth_state' => $faker->township,
            'race' => 'Malay',
            'religion' => $faker->randomElement($religion),
            'disability' =>  $faker->randomElement($disability),
            'marriage_status' => $faker->randomElement($marriage_status),
            'phone' => $faker->mobileNumber($countryCodePrefix = false, $hyphen = false),
            'address_1' => $faker->buildingPrefix . $faker->buildingNumber . " " . $faker->streetName,
            'address_2' => $faker->township,
            'city' => $faker->city,
            'postal' => $faker->postcode,
            'state' => $faker->state,
            'country' => 'Malaysia',
            'about_me' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
            'profile_view' => $faker->numberBetween($min = 10, $max = 50),
            'expected_salary' => $faker->numberBetween($min = 900, $max = 3000),
        ]);

        $end_duration = Carbon\Carbon::now();
        $stop = rand(0,4);
        
        for($i = 0; $i < $stop; $i++) {
            $end = $end_duration->format('Y');
            $start_duration = $end_duration->subYears(rand(4,8));
            $start = $start_duration->format('Y');

            $alumni->works()->create([
                'position_title' => $fakerUS->jobTitle,
                'position_level' => $faker->randomElement($positionLevel),
                'job_category' => $faker->randomElement($jobCategory),
                'company_name' => $faker->companyName,
                'start_duration' => $start,
                'end_duration' => $end,
                'salary' => $faker->randomNumber(5),
            ]);
        }

        $stop = rand(0,3);
        
        for($i = 0; $i < $stop; $i++) {
            $alumni->educations()->create([
                'major' => $faker->course,
                'education_level' => $faker->randomElement($educationLevel),
                'institution' => $faker->university,
                'qualification_level' => $faker->randomElement($qualificationLevel),
                'graduate_month' => $faker->monthName,
                'graduate_year' => $faker->year($max = 'now'),
            ]);
        }

        $stop = rand(0,4);
        
        for($i = 0; $i < $stop; $i++) {
            $alumni->languages()->create([
                'name' => $faker->randomElement($languages),
                'proficiency' => $faker->randomElement($proficiency),
            ]);
        }        
        for($i = 0; $i < $stop; $i++) {
            $alumni->skills()->create([
                'name' => $faker->randomElement($skills),
                'proficiency' => $faker->randomElement($proficiency),
            ]);
        }


        // -------------------------------------------------------
        
        $birth = $faker->date($format = 'Y-m-d', $max = 'now');
        $myKad = date('ymd', strtotime($birth)) . $faker->randomNumber($nbDigits = 6, $strict = true);

        $alumni = User::create([
            'firstname' => 'Intan Nuralisa',
            'lastname' => 'Mat Dali',
            'gender' => 'F',
            'username' => 'inuralisa',
            'email' => 'inuralisa@gmail.com',
            'role_id' => 5,
            'password' => Hash::make('123456'),
        ])->alumni()->create([
            'identity_card' => $myKad,
            'birth_date' => $birth,
            'birth_state' => $faker->township,
            'race' => 'Malay',
            'religion' => $faker->randomElement($religion),
            'disability' =>  $faker->randomElement($disability),
            'marriage_status' => $faker->randomElement($marriage_status),
            'phone' => $faker->mobileNumber($countryCodePrefix = false, $hyphen = false),
            'address_1' => $faker->buildingPrefix . $faker->buildingNumber . " " . $faker->streetName,
            'address_2' => $faker->township,
            'city' => $faker->city,
            'postal' => $faker->postcode,
            'state' => $faker->state,
            'country' => 'Malaysia',
            'about_me' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
            'profile_view' => $faker->numberBetween($min = 10, $max = 50),
            'expected_salary' => $faker->numberBetween($min = 900, $max = 3000),
        ]);

        $end_duration = Carbon\Carbon::now();
        $stop = rand(0,4);
        
        for($i = 0; $i < $stop; $i++) {
            $end = $end_duration->format('Y');
            $start_duration = $end_duration->subYears(rand(4,8));
            $start = $start_duration->format('Y');

            $alumni->works()->create([
                'position_title' => $fakerUS->jobTitle,
                'position_level' => $faker->randomElement($positionLevel),
                'job_category' => $faker->randomElement($jobCategory),
                'company_name' => $faker->companyName,
                'start_duration' => $start,
                'end_duration' => $end,
                'salary' => $faker->randomNumber(5),
            ]);
        }

        $stop = rand(0,3);
        
        for($i = 0; $i < $stop; $i++) {
            $alumni->educations()->create([
                'major' => $faker->course,
                'education_level' => $faker->randomElement($educationLevel),
                'institution' => $faker->university,
                'qualification_level' => $faker->randomElement($qualificationLevel),
                'graduate_month' => $faker->monthName,
                'graduate_year' => $faker->year($max = 'now'),
            ]);
        }

        $stop = rand(0,4);
        
        for($i = 0; $i < $stop; $i++) {
            $alumni->languages()->create([
                'name' => $faker->randomElement($languages),
                'proficiency' => $faker->randomElement($proficiency),
            ]);
        }        
        for($i = 0; $i < $stop; $i++) {
            $alumni->skills()->create([
                'name' => $faker->randomElement($skills),
                'proficiency' => $faker->randomElement($proficiency),
            ]);
        }


        // Employer Role


        // -------------------------------------------------------
        
        $birth = $faker->date($format = 'Y-m-d', $max = 'now');
        $myKad = date('ymd', strtotime($birth)) . $faker->randomNumber($nbDigits = 6, $strict = true);

        $employer = User::create([
            'firstname' => 'Mohd Aiman',
            'lastname' => 'Selamat',
            'gender' => 'M',
            'username' => 'maiman',
            'email' => 'maiman@gmail.com',
            'role_id' => 4,
            'password' => Hash::make('123456'),
        ])->employer()->create([
            'identity_card' => $myKad,
            'birth_date' => $birth,
            'race' => 'Malay',
            'religion' => $faker->randomElement($religion),
            'current_position' => $fakerUS->jobTitle,
            'employer_type' => $faker->randomElement($employer_type),
            'phone' => $faker->mobileNumber($countryCodePrefix = false, $hyphen = false),
        ]);;
        
        $employer->company()->create([
            'name' => $faker->companyName,
            'ssm' => $faker->swiftCode,
            'job_category' => $faker->randomElement($jobCategory),
            'company_type' => $faker->randomElement($companyType),
            'company_size' => $faker->randomElement($companySize),
            'about_us' => $faker->paragraph($nbSentences = 1, $variableNbSentences = true),
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


        // -------------------------------------------------------
        
        $birth = $faker->date($format = 'Y-m-d', $max = 'now');
        $myKad = date('ymd', strtotime($birth)) . $faker->randomNumber($nbDigits = 6, $strict = true);

        $employer = User::create([
            'firstname' => 'Siti Zahrah',
            'lastname' => 'Khalid Ali',
            'gender' => 'F',
            'username' => 'szahrah',
            'email' => 'szahrah@gmail.com',
            'role_id' => 4,
            'password' => Hash::make('123456'),
        ])->employer()->create([
            'identity_card' => $myKad,
            'birth_date' => $birth,
            'race' => 'Malay',
            'religion' => $faker->randomElement($religion),
            'current_position' => $fakerUS->jobTitle,
            'employer_type' => $faker->randomElement($employer_type),
            'phone' => $faker->mobileNumber($countryCodePrefix = false, $hyphen = false),
        ]);
        
        $employer->company()->create([
            'name' => $faker->companyName,
            'ssm' => $faker->swiftCode,
            'job_category' => $faker->randomElement($jobCategory),
            'company_type' => $faker->randomElement($companyType),
            'company_size' => $faker->randomElement($companySize),
            'about_us' => $faker->paragraph($nbSentences = 1, $variableNbSentences = true),
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





        foreach (range(1,200) as $index) {
        	$username = $faker->unique()->userName;
        	$email = $username.'@gmail.com';

        	$role_id = $faker->numberBetween($min = 4, $max = 5);
	        $birth = $faker->date($format = 'Y-m-d', $max = 'now');
	        $myKad = date('ymd', strtotime($birth)) . $faker->randomNumber($nbDigits = 6, $strict = true);

	        switch ($role_id) {
	        	case 4:	        		
					$employer = User::create([				
						'firstname' => $faker->firstName,
		                'lastname' => $faker->lastName,
		                'gender' => $faker->randomElement($array = array('M', 'F')),
						'username' => $username,
						'email' => $email,
		                'role_id' => $role_id,
						'password' => Hash::make('123456'),
					])->employer()->create([
			            'identity_card' => $myKad,
			            'birth_date' => $birth,
			            'race' => $faker->randomElement($race),
			            'religion' => $faker->randomElement($religion),
			            'current_position' => $fakerUS->jobTitle,
			            'employer_type' => $faker->randomElement($employer_type),
			            'phone' => $faker->mobileNumber($countryCodePrefix = false, $hyphen = false),
			        ]);
        
                    $employer->company()->create([
                        'name' => $faker->companyName,
                        'ssm' => $faker->swiftCode,
                        'job_category' => $faker->randomElement($jobCategory),
                        'company_type' => $faker->randomElement($companyType),
                        'company_size' => $faker->randomElement($companySize),
                        'about_us' => $faker->paragraph($nbSentences = 1, $variableNbSentences = true),
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
	        		break;
	        	
	        	case 5:	        		
					$alumni = User::create([				
						'firstname' => $faker->firstName,
		                'lastname' => $faker->lastName,
		                'gender' => $faker->randomElement($array = array('M', 'F')),
						'username' => $username,
						'email' => $email,
		                'role_id' => $role_id,
						'password' => Hash::make('123456'),
					])->alumni()->create([
			            'identity_card' => $myKad,
			            'birth_date' => $birth,
			            'birth_state' => $faker->township,
			            'race' => $faker->randomElement($race),
			            'religion' => $faker->randomElement($religion),
			            'disability' =>  $faker->randomElement($disability),
			            'marriage_status' => $faker->randomElement($marriage_status),
			            'phone' => $faker->mobileNumber($countryCodePrefix = false, $hyphen = false),
			            'address_1' => $faker->buildingPrefix . $faker->buildingNumber . " " . $faker->streetName,
			            'address_2' => $faker->township,
			            'city' => $faker->city,
			            'postal' => $faker->postcode,
			            'state' => $faker->state,
			            'country' => 'Malaysia',
            			'about_me' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
                        'profile_view' => $faker->numberBetween($min = 10, $max = 50),
                        'expected_salary' => $faker->numberBetween($min = 900, $max = 3000),
			        ]);                    

                    $end_duration = Carbon\Carbon::now();
                    $stop = rand(0,4);
                    
                    for($i = 0; $i < $stop; $i++) {
                        $end = $end_duration->format('Y');
                        $start_duration = $end_duration->subYears(rand(4,8));
                        $start = $start_duration->format('Y');

                        $alumni->works()->create([
                            'position_title' => $fakerUS->jobTitle,
                            'position_level' => $faker->randomElement($positionLevel),
                            'job_category' => $faker->randomElement($jobCategory),
                            'company_name' => $faker->companyName,
                            'start_duration' => $start,
                            'end_duration' => $end,
                            'salary' => $faker->randomNumber(5),
                        ]);
                    }

                    $stop = rand(0,3);
                    
                    for($i = 0; $i < $stop; $i++) {
                        $alumni->educations()->create([
                            'major' => $faker->course,
                            'education_level' => $faker->randomElement($educationLevel),
                            'institution' => $faker->university,
                            'qualification_level' => $faker->randomElement($qualificationLevel),
                            'graduate_month' => $faker->monthName,
                            'graduate_year' => $faker->year($max = 'now'),
                        ]);
                    }

                    $stop = rand(0,4);
                    
                    for($i = 0; $i < $stop; $i++) {
                        $alumni->languages()->create([
                            'name' => $faker->randomElement($languages),
                            'proficiency' => $faker->randomElement($proficiency),
                        ]);
                    }        
                    for($i = 0; $i < $stop; $i++) {
                        $alumni->skills()->create([
                            'name' => $faker->randomElement($skills),
                            'proficiency' => $faker->randomElement($proficiency),
                        ]);
                    }
	        		break;
	        	
	        	default:
	        		break;
	        }
		}    
    }
}
