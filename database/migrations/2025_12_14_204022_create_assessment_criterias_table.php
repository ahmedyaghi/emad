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
        Schema::create('assessment_criterias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assessment_id')->constrained('assessments')->onDelete('cascade');
            $table->foreignId('criteria_id')->constrained('general_criterias')->onDelete('cascade');
            $table->foreignId('evaluation_id')->nullable()->constrained('evaluations')->onDelete('set null');
            $table->text('notes')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->integer('weight_percentage')->nullable();
            $table->string('achievement_level')->nullable();
            $table->string('recommendations')->nullable();
            $table->string('responsible_side')->nullable();
            $table->string('action_required')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment_criterias');
    }
};
