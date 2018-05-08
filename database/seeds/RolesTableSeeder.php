<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
    		'name' => 'admin',
    		'description' => 'A user from UTM CICT department to handle system server.',
       	]);
        Role::create([
    		'name' => 'utmcc',
    		'description' => 'A user from UTM Career Centre department to handle employment process.',
       	]);
        Role::create([
    		'name' => 'utma',
    		'description' => 'A user from UTM Alumni that able to track employment record.',
       	]);
        Role::create([
    		'name' => 'employer',
    		'description' => 'A user that allow to recruit alumni fro employment.',
       	]);
        Role::create([
    		'name' => 'alumni',
    		'description' => 'A user that is a student graduate from UTM.',
       	]);
    }
}
