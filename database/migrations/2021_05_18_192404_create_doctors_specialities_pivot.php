<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsSpecialitiesPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_speciality', function (Blueprint $table) {
            $table->integer('doctor_id')->unsigned()->index();
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->integer('speciality_id')->unsigned()->index();
            $table->foreign('speciality_id')->references('id')->on('specialities')->onDelete('cascade');
            $table->primary(['doctor_id', 'speciality_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_speciality');
    }
}
