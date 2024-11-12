<?php

use App\Enums\SkillLevel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * @table - skills
 *
 * @description - Tabla con las habilidades y nivel de estas
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->constrained('personal_info')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->enum('level', array_column(SkillLevel::cases(), 'value'));
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
