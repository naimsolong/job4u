<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employer_id')->unsigned();
            $table->string('name');
            $table->string('ssm');
            $table->string('job_category');
            $table->string('company_type');
            $table->string('company_size');
            $table->string('about_us');
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('city');
            $table->string('postal', 5);
            $table->string('state');
            $table->string('country');
            $table->string('dress_code')->nullable()->default('Formal Dress');
            $table->string('work_days');
            $table->string('work_hours');
            $table->string('website_url');
            $table->integer('verification')->default(0);
            $table->integer('profile_view')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
