<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Proficiency;

class ProficienciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profiencies = array(
        	'Beginner',
        	'Intermediate',
        	'Advanced',
        );

        foreach ($profiencies as $profiency) {
        	Proficiency::create([
        		'name' => $profiency,
        	]);
        }
    }
}
