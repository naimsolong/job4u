<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('identity_card', 12);
            $table->date('birth_date');
            $table->string('birth_state');
            $table->string('race');
            $table->string('religion');
            $table->string('disability', 1);
            $table->string('marriage_status');
            $table->string('phone', 13);
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('city');
            $table->string('postal', 5);
            $table->string('state');
            $table->string('country');
            $table->text('about_me', 200);
            $table->integer('profile_view')->default(0);
            $table->integer('expected_salary')->default(0);
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
        Schema::dropIfExists('alumnis');
    }
}
