<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->unique();
            $table->integer('nuhsa')->unique();
            $table->string('medicalHistory');
            //$table->unsignedInteger('doctor_id');
            //$table->unsignedInteger('symptom_id');
            //$table->unsignedInteger('appointment_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            //$table->foreign('doctor_id')->references('doctor_id')->on('doctor_patient')->onDelete('cascade')->onUpdate('cascade');
            //$table->foreign('symptom_id')->references('id')->on('symptoms')->onDelete('cascade')->onUpdate('cascade');
            //$table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
