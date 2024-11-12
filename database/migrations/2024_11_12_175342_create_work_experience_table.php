<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * @table - work_experience
 *
 * @description - Tabla con las experiencias laborales
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('work_experience', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->constrained('personal_info')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->string('company');
            $table->text('position');
            $table->text('responsibilities')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('is_current')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('work_experience');
    }
};
