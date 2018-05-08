<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\CompanyType;

class CompanyTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company_type = array(
        	'Multinational',
        	'Small-Medium Enterprize',

        	'Sole proprietorship',
        	'Partnership',
        	'Limited Liability Partnership (LLP)',
        	'Private Limited Company (Sdn Bhd\'s)',
        	'Public Limited Company (Berhad\'s)',
        	'Companies limited by guarantee',
        	'Foreign companies',
        );

        foreach ($company_type as $type) {
        	CompanyType::create([
        		'name' => $type,
        	]);
        }
    }
}
