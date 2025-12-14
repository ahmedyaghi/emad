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
        Schema::create('trainee_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('training_opportunity_applications')->onDelete('cascade');
            $table->foreignId('criteria_id')->constrained('general_criterias')->onDelete('cascade');
            $table->foreignId('evaluation_id')->nullable()->constrained('evaluations')->onDelete('set null');
            $table->text('notes')->nullable();
            $table->decimal('hours', 8, 2)->nullable(); // الوزن النسبي
            $table->string('achievement_level')->nullable();
            $table->string('recommendation')->nullable();
            $table->string('responsible')->nullable();
            $table->string('action')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainee_progress');
    }
};
