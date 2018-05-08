<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\JobCategory;

class JobCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobCategory = array(
        	'Accounting/Auditing',
			'Admin/Human Resources',
			'Arts/Design',
			'Building/Construction/Property',
			'Business Management/Project/Planning',
			'Computer/Information Technology',
			'Education/Training',
			'Engineering',
			'Finance/Banking/Insurance',
			'Healthcare/Beauty/Fitness',
			'Hotel/Restaurant/Tourism',
			'Legal/Public/Security',
			'Maintenance/Repair',
			'Manufacturing/Production',
			'Media/Communications/Entertainment',
			'Others',
			'Purchasing/Procurement/Inventory',
			'Quality Assurance/Control',
			'Sales/Marketing',
			'Services',
			'Sciences/R&D/Research',
			'Transportation/Logistics',
        );

        foreach ($jobCategory as $category) {
        	JobCategory::create([
        		'name' => $category,
        	]);
        }
    }
}
