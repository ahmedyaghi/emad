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
            $table->string('title');
            $table->text('short_description')->nullable();
            $table->string('location')->nullable();
            $table->string('duration')->nullable();
            $table->string('attendance')->nullable();
            $table->string('salaray')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('conditions')->nullable();
            $table->text('features')->nullable();
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
