<?php

use Illuminate\Database\Seeder;

use App\Faculty;

class FacultiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faculties = array(
        	'Faculty of Civil Engineering',
        	'Faculty of Computing',
        	'Faculty of Management',
        	'Faculty of Education',
        	'Faculty of Electrical Engineering',
        	'Faculty of Chemical Engineering',
        	'Faculty of Science',
        	'Faculty of Geoinformatic',
        	'Faculty of Business',
        	'Faculty of Mathematic',
        );

        foreach ($faculties as $faculty) {
        	Faculty::create([
        		'name' => $faculty,
        	]);
        }
    }
}
