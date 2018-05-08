<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Work;
use App\JobCategory;
use App\JobPositionLevel;

class WorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $faker->addProvider(new Faker\Provider\ms_MY\Company($faker));
        $fakerUS = Faker\Factory::create();
        $fakerUS->addProvider(new Faker\Provider\en_US\Company($faker));

        // $positionLevel = array(
        // 	'Senior Manager', 'Manager', 'Senior Executive', 'Jr. Executive', 'Fresh/Entry Level', 'Non-Executive', 'Intern', 'Others',
        // );

        $positionLevel = JobPositionLevel::pluck('name')->all();

        // $jobCategory = array(
        //     'Accounting/Auditing',
        //     'Admin/Human Resources',
        //     'Arts/Design',
        //     'Building/Construction/Property',
        //     'Business Management/Project/Planning',
        //     'Computer/Information Technology',
        //     'Education/Training',
        //     'Engineering',
        //     'Finance/Banking/Insurance',
        //     'Healthcare/Beauty/Fitness',
        //     'Hotel/Restaurant/Tourism',
        //     'Legal/Public/Security',
        //     'Maintenance/Repair',
        //     'Manufacturing/Production',
        //     'Media/Communications/Entertainment',
        //     'Others',
        //     'Purchasing/Procurement/Inventory',
        //     'Quality Assurance/Control',
        //     'Sales/Marketing',
        //     'Services',
        //     'Sciences/R&D/Research',
        //     'Transportation/Logistics',
        // );

        $jobCategory = JobCategory::pluck('name')->all();

        foreach(range(1, 3) as $index) {
            $end = $faker->date($format = 'Y-m-d H:i:s', $max = 'now');
            $end_duration = Carbon\Carbon::parse($end)->format('Y');
            $start_duration = $faker->date($format = 'Y', $max = $end);

        	Work::create([
	        	'alumni_id' => $index,
	        	'position_title' => $fakerUS->jobTitle,
	        	'position_level' => $faker->randomElement($positionLevel),
	        	'job_category' => $faker->randomElement($jobCategory),
	        	'company_name' => $faker->companyName,
	        	'start_duration' => $start_duration,
	        	'end_duration' => $end_duration,
	        	'salary' => $faker->randomNumber(5),
	        ]);
        }

        foreach(range(4, 20) as $index) {
            $end = $faker->date($format = 'Y-m-d H:i:s', $max = 'now');
            $end_duration = Carbon\Carbon::parse($end)->format('Y');
            $start_duration = $faker->date($format = 'Y', $max = $end);

        	Work::create([
	        	'alumni_id' => $faker->biasedNumberBetween($min = 1, $max = 10),
	        	'position_title' => $fakerUS->jobTitle,
	        	'position_level' => $faker->randomElement($positionLevel),
	        	'job_category' => $faker->randomElement($jobCategory),
	        	'company_name' => $faker->companyName,
                'start_duration' => $start_duration,
                'end_duration' => $end_duration,
	        	'salary' => $faker->randomNumber(5),
	        ]);
        }
    }
}
