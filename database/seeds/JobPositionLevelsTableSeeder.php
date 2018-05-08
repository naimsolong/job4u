<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\JobPositionLevel;

class JobPositionLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positionLevel = array(
			'Senior Manager',
			'Manager',
			'Senior Executive',
			'Jr. Executive',
			'Fresh\Entry Level',
			'Non-Executive',
			'Intern',
			'Others',
        );

        foreach ($positionLevel as $position) {
        	JobPositionLevel::create([
        		'name' => $position,
        	]);
        }
        
    }
}
