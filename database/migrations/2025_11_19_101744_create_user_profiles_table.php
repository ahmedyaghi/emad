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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('country_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('city_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('section_type_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('place_type_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('work_type_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('neighabourhood_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('specialization_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('nationality_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('skill_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('university_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('position_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('bio')->nullable();
            $table->string('website')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->integer('age')->nullable();
            $table->integer('sex')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('manager_name')->nullable();
            $table->string('manager_phone')->nullable();
            $table->string('manager_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
