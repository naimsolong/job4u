<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

    	User::create([
            'firstname' => 'Abdul Salman',
            'lastname' => 'Ahmad Muis',
            'gender' => 'M',
    		'username' => 'abdsalman',
    		'email' => 'abdsalman@gmail.com',
            'role_id' => 5,
    		'password' => Hash::make('123456'),
    	]);

        User::create([
            'firstname' => 'Amirul Naim',
            'lastname' => 'Mohd Solong',
            'gender' => 'M',
            'username' => 'naimteehee',
            'email' => 'naimteehee@gmail.com',
            'role_id' => 5,
            'password' => Hash::make('123456'),
        ]);

        User::create([
            'firstname' => 'Intan Nuralisa',
            'lastname' => 'Mat Dali',
            'gender' => 'F',
            'username' => 'inuralisa',
            'email' => 'inuralisa@gmail.com',
            'role_id' => 5,
            'password' => Hash::make('123456'),
        ]);

        foreach (range(1,7) as $index) {
        	$username = $faker->unique()->userName;
        	$email = $username.'gmail.com';

			User::create([
				
				'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'gender' => $faker->randomElement($array = array('M', 'F')),
				'username' => $username,
				'email' => $email,
                'role_id' => $faker->numberBetween($min = 1, $max = 5),
				'password' => Hash::make('123456'),
			]);
		}    
    }
}
