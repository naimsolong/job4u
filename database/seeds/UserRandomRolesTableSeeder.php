<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Alumni;
use App\Employer;
use App\EmployerType;

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

        $fakerUS = Faker\Factory::create();
        $fakerUS->addProvider(new Faker\Provider\en_US\Company($faker));

		$race = array('Malay', 'Chinese', 'Indian', 'Others');
		$religion = array('Islam', 'Christian', 'Hindu', 'Buddha', 'Others');
		$disability = array('Y', 'N');
		$marriage_status = array('Single', 'Married');

        // $employer_type = array('Recruitment Department', 'Direct Employer');
        $employer_type = EmployerType::pluck('name')->all();

        // Alumni Role

        $birth = $faker->date($format = 'Y-m-d', $max = 'now');
        $myKad = date('ymd', strtotime($birth)) . $faker->randomNumber($nbDigits = 6, $strict = true);        

        User::create([
            'firstname' => 'Dollah 1',
            'lastname' => 'Salleh',
            'gender' => 'M',
            'username' => 'dollah1',
            'email' => 'dollah1@gmail.com',
            'role_id' => 1,
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'firstname' => 'Dollah 2',
            'lastname' => 'Salleh',
            'gender' => 'M',
            'username' => 'dollah2',
            'email' => 'dollah2@gmail.com',
            'role_id' => 2,
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'firstname' => 'Dollah 3',
            'lastname' => 'Salleh',
            'gender' => 'M',
            'username' => 'dollah3',
            'email' => 'dollah3@gmail.com',
            'role_id' => 3,
            'password' => Hash::make('123456'),
        ]);

    	User::create([
            'firstname' => 'Abdul Salman',
            'lastname' => 'Ahmad Muis',
            'gender' => 'M',
    		'username' => 'abdsalman',
    		'email' => 'abdsalman@gmail.com',
            'role_id' => 5,
    		'password' => Hash::make('123456'),
    	])->alumni()->create([
            // 'user_id' => $n--,
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

        $birth = $faker->date($format = 'Y-m-d', $max = 'now');
        $myKad = date('ymd', strtotime($birth)) . $faker->randomNumber($nbDigits = 6, $strict = true);

        User::create([
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

        $birth = $faker->date($format = 'Y-m-d', $max = 'now');
        $myKad = date('ymd', strtotime($birth)) . $faker->randomNumber($nbDigits = 6, $strict = true);

        User::create([
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

        // Employer Role
        
        $birth = $faker->date($format = 'Y-m-d', $max = 'now');
        $myKad = date('ymd', strtotime($birth)) . $faker->randomNumber($nbDigits = 6, $strict = true);

        User::create([
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

        $birth = $faker->date($format = 'Y-m-d', $max = 'now');
        $myKad = date('ymd', strtotime($birth)) . $faker->randomNumber($nbDigits = 6, $strict = true);

        User::create([
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

        $birth = $faker->date($format = 'Y-m-d', $max = 'now');
        $myKad = date('ymd', strtotime($birth)) . $faker->randomNumber($nbDigits = 6, $strict = true);

        User::create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'gender' => 'M',
            'username' => 'johndoe',
            'email' => 'johndoe@gmail.com',
            'role_id' => 4,
            'password' => Hash::make('123456'),
        ])->employer()->create([
            'identity_card' => $myKad,
            'birth_date' => $birth,
            'race' => 'Others',
            'religion' => $faker->randomElement($religion),
            'current_position' => $fakerUS->jobTitle,
            'employer_type' => $faker->randomElement($employer_type),
            'phone' => $faker->mobileNumber($countryCodePrefix = false, $hyphen = false),
        ]);

        $birth = $faker->date($format = 'Y-m-d', $max = 'now');
        $myKad = date('ymd', strtotime($birth)) . $faker->randomNumber($nbDigits = 6, $strict = true);

        User::create([
            'firstname' => 'Raj',
            'lastname' => 'kathropali',
            'gender' => 'M',
            'username' => 'rajkat',
            'email' => 'rajkat@gmail.com',
            'role_id' => 4,
            'password' => Hash::make('123456'),
        ])->employer()->create([
            'identity_card' => $myKad,
            'birth_date' => $birth,
            'race' => 'Indian',
            'religion' => $faker->randomElement($religion),
            'current_position' => $fakerUS->jobTitle,
            'employer_type' => $faker->randomElement($employer_type),
            'phone' => $faker->mobileNumber($countryCodePrefix = false, $hyphen = false),
        ]);

        foreach (range(1,10) as $index) {
        	$username = $faker->unique()->userName;
        	$email = $username.'@gmail.com';

        	$role_id = $faker->numberBetween($min = 4, $max = 5);
	        $birth = $faker->date($format = 'Y-m-d', $max = 'now');
	        $myKad = date('ymd', strtotime($birth)) . $faker->randomNumber($nbDigits = 6, $strict = true);

	        switch ($role_id) {
	        	case 4:	        		
					User::create([				
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
	        		break;
	        	
	        	case 5:	        		
					User::create([				
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
			        ]);;
	        		break;
	        	
	        	default:
	        		break;
	        }
		}    
    }
}
