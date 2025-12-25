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

        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('training_opportunity_applications')->onDelete('cascade');
            $table->foreignId('association_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('consultant_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('faculty_member_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('name');
            $table->text('description')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
