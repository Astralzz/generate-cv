<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * @table - personal_info
 *
 * @description - Tabla con la información básica y personal
 */
return new class extends Migration
{

    public function up(): void
    {
        Schema::create('personal_info', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->text('description');
            $table->string('job_title')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('path_imagen')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personal_info');
    }
};
