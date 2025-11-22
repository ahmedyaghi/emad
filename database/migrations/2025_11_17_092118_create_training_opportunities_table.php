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
        Schema::create('training_opportunities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('association_id')->constrained('associations')->onDelete('cascade');
            $table->foreignId('type_id')->nullable()->constrained('training_opportunity_types')->onDelete('cascade');
            $table->foreignId('city_id')->nullable()->constrained('cities')->onDelete('cascade');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->string('location')->nullable();
            $table->string('duration')->nullable();
            $table->string('attendance')->nullable();
            $table->string('salaray')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('conditions')->nullable();
            $table->text('features')->nullable();
            $table->boolean('for_male')->nullable()->default(0);
            $table->boolean('for_female')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_opportunities');
    }
};
