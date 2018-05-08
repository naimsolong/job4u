<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            // -------------- Insert Others Small Table
            
            FacultiesTableSeeder::class,

            JobCategoriesTableSeeder::class,
            JobPositionLevelsTableSeeder::class, 

            EducationLevelsTableSeeder::class,
            EducationQualificationLevelsTableSeeder::class,

            EmployerTypesTableSeeder::class,

            ProficienciesTableSeeder::class,

            CompanyTypesTableSeeder::class,
            CompanySizesTableSeeder::class,


            // -------------- Insert User with Random Role
            
            // UserRandomRolesTableSeeder::class,
            // UsersTableSeeder::class,
            RolesTableSeeder::class,
            AdminsTableSeeder::class,


            // -------------- Insert Alumni Profile

            // AlumnisTableSeeder::class,
            // WorksTableSeeder::class,
            // EducationsTableSeeder::class,
            // SkillsTableSeeder::class,
            // LanguagesTableSeeder::class,

            // GraduatesTableSeeder::class,


            // -------------- Insert Company Profile

            // CompaniesTableSeeder::class,
            

            // -------------- Insert Job

            // JobsTableSeeder::class,
            

            // -------------- Insert Applications

            // ApplicationsTableSeeder::class,
            // AddApplicationsTableSeeder::class,





        ]);
    }
}
