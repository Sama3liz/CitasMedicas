<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinical_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Details
            $table->string('details')->nullable();
            // Doctor
            $table->unsignedBigInteger('done_by_id');
            $table->foreign('done_by_id')->references('id')->on('users')->onDelete('cascade');
            // Patient
            $table->unsignedBigInteger('for_patient_id');
            $table->foreign('for_patient_id')->references('id')->on('users')->onDelete('cascade');
            // Specialty
            $table->unsignedBigInteger('at_specialty_id');
            $table->foreign('at_specialty_id')->references('id')->on('specialties')->onDelete('cascade');
            // Appointment
            $table->unsignedBigInteger('appointment_id');
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
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
        Schema::dropIfExists('clinical_histories');
    }
};
