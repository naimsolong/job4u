<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employer_id')->unsigned();
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->string('title');
            $table->string('position_level');
            $table->string('job_category');
            $table->string('location_city');
            $table->string('location_state');
            $table->integer('salary_min');
            $table->integer('salary_max')->nullable();
            $table->string('requirements', 500);
            $table->string('responsibilities', 500);
            $table->string('benefits', 500);
            $table->string('descriptions', 500);
            $table->integer('availability')->default(0);
            $table->integer('job_view')->default(0);
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
        Schema::dropIfExists('jobs');
    }
}
