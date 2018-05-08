<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\CompanySize;

class CompanySizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company_size = array(
        	'<50 employers',
        	'50-100 employers',
        	'>100 employers',
        );

        foreach ($company_size as $size) {
        	CompanySize::create([
        		'name' => $size,
        	]);
        }
    }
}
