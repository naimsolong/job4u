<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\EducationLevel;

class EducationLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $educationLevel = array(
        	'Primary/Secondary School/SPM/\'O\' Level',
        	'Higher Secondary/STPM/\'A\' Level/Pre-U',
        	'Professional Certificate',
        	'Diploma',
        	'Advanced/Higher/Graduate Diploma',
        	'Bachelor\'s Degree',
        	'Post Graduate Diploma',
        	'Professional Degree',
        	'Master\'s Degree',
        	'Doctorate (PhD)',
        );

        foreach ($educationLevel as $level) {
        	EducationLevel::create([
        		'name' => $level,
        	]);
        }
    }
}
