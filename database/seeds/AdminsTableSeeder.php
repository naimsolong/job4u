<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Admin;

class AdminsTableSeeder extends Seeder
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

		$race = array('Malay', 'Chinese', 'Indian', 'Others');
		$religion = array('Islam', 'Christian', 'Hindu', 'Buddha', 'Others');

        $birth = $faker->date($format = 'Y-m-d', $max = 'now');
        $myKad = date('ymd', strtotime($birth)) . $faker->randomNumber($nbDigits = 6, $strict = true);

        User::create([
            'firstname' => 'Shah',
            'lastname' => 'Ahmad',
            'gender' => 'M',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'role_id' => 1,
            'password' => Hash::make('123456'),
        ])->admin()->create([
            'identity_card' => $myKad,
            'birth_date' => $birth,
            'race' => $faker->randomElement($race),
            'religion' => $faker->randomElement($religion),
        ]);


        $birth = $faker->date($format = 'Y-m-d', $max = 'now');
        $myKad = date('ymd', strtotime($birth)) . $faker->randomNumber($nbDigits = 6, $strict = true);

        User::create([
            'firstname' => 'Norizah',
            'lastname' => 'Salleh',
            'gender' => 'F',
            'username' => 'utmcc',
            'email' => 'utmcc@gmail.com',
            'role_id' => 2,
            'password' => Hash::make('123456'),
        ])->admin()->create([
            'identity_card' => $myKad,
            'birth_date' => $birth,
            'race' => $faker->randomElement($race),
            'religion' => $faker->randomElement($religion),
        ]);


        $birth = $faker->date($format = 'Y-m-d', $max = 'now');
        $myKad = date('ymd', strtotime($birth)) . $faker->randomNumber($nbDigits = 6, $strict = true);
        
        User::create([
            'firstname' => 'Shafiq',
            'lastname' => 'Dollah',
            'gender' => 'M',
            'username' => 'utma',
            'email' => 'utma@gmail.com',
            'role_id' => 3,
            'password' => Hash::make('123456'),
        ])->admin()->create([
            'identity_card' => $myKad,
            'birth_date' => $birth,
            'race' => $faker->randomElement($race),
            'religion' => $faker->randomElement($religion),
        ]);
    }
}
