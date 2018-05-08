<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('alumni_id')->unsigned();
            $table->foreign('alumni_id')->references('id')->on('alumnis')->onDelete('cascade');
            $table->integer('employer_id')->unsigned();
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
            $table->integer('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->integer('status')->unsigned()->default(1);
            $table->date('last_seen')->nullable();
            $table->string('remarks', 500)->nullable();
            $table->datetime('shortlist_datetime')->nullable();
            $table->datetime('interview_datetime')->nullable();
            $table->string('interview_location')->nullable();
            $table->datetime('hire_reject_datetime')->nullable();
            $table->integer('a_notification')->default(0);
            $table->integer('e_notification')->default(0);
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
        Schema::dropIfExists('applications');
    }
}
