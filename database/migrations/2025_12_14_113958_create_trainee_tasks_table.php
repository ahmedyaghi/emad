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
        Schema::create('trainee_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('training_opportunity_applications')->onDelete('cascade');
            $table->foreignId('evaluation_id')->nullable()->constrained('evaluations')->onDelete('set null');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->decimal('number_of_hours', 8, 2)->nullable();
            $table->string('achievement_level')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainee_tasks');
    }
};
