<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\EmployerType;

class EmployerTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employerType = array(
			'Recruitment Department',
			'Direct Employer',
        );

        foreach ($employerType as $type) {
        	EmployerType::create([
        		'name' => $type,
        	]);
        }    }
}
