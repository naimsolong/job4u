<?php

use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;

use App\Alumni;


class AlumnisTableSeeder extends Seeder
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
    	$n = 10;

        foreach (range(1, 10) as $index) {
        	$birth = $faker->date($format = 'Y-m-d', $max = 'now');
        	$myKad = date('ymd', strtotime($birth)) . $faker->randomNumber($nbDigits = 6, $strict = true);

        	Alumni::create([
        		'user_id' => $n--,
        		'identity_card' => $myKad,
        		'birth_date' => $birth,
        		'birth_state' => $faker->township,
        		'race' => $faker->randomElement($array = array('Malay', 'Chinese', 'Indian', 'Others')),
        		'religion' => $faker->randomElement($array = array('Islam', 'Christian', 'Hindu', 'Buddha')),
        		'disability' =>  $faker->randomElement($array = array('Y', 'N')),
        		'marriage_status' => $faker->randomElement($array = array('Single', 'Married')),
        		'phone' => $faker->mobileNumber($countryCodePrefix = false, $hyphen = false),
        		'address_1' => $faker->buildingPrefix . $faker->buildingNumber . " " . $faker->streetName,
        		'address_2' => $faker->township,
        		'city' => $faker->city,
        		'postal' => $faker->postcode,
        		'state' => $faker->state,
        		'country' => 'Malaysia',
        		'about_me' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        	]);
        }
    }
}
