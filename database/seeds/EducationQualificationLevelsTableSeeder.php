<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\EducationQualificationLevel;

class EducationQualificationLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $qualificationLevel = array(
        	'First Class',
        	'Second Class Upper',
        	'Second Class Lower',
        	'Third Class',
        	'Incomplete',
        );

        foreach ($qualificationLevel as $level) {
        	EducationQualificationLevel::create([
        		'name' => $level,
        	]);
        }
    }
}
