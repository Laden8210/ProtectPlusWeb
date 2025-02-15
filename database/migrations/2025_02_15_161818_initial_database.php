<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evacuation_areas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('capacity');
            $table->string('type_facility');
            $table->string('status');
            $table->string('image');
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();
        });

        Schema::create('hazard_prone_area', function (Blueprint $table) {
            $table->id();
            $table->string('location_name');
            $table->string('location');
            $table->string('hazard_type');
            $table->string('risk_level');
            $table->string('status');
            $table->string('image');
            $table->timestamps();
        });

        Schema::create('emergency_hotlines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('emergency_hotline_type');
            $table->string('contact_number');
            $table->string('telephone_number');
            $table->string('address');
            $table->string('type');
            $table->string('status');
            $table->timestamps();
        });


        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('contact_number');
            $table->string('email');
            $table->string('address');
            $table->string('dob');
            $table->string('status');
            $table->string('image');
            $table->string('username');
            $table->string('password');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
