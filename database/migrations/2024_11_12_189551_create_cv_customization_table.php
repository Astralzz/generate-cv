<?php

use App\Enums\FontFamily;
use App\Enums\LayoutCv;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * @table - cv_customization
 *
 * @description - Tabla con las configuraciones y diseño de el cv
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cv_customization', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->constrained('personal_info')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->enum('layout',  array_column(LayoutCv::cases(), 'value'))
                ->default(LayoutCv::Default);
            $table->enum('font_family', array_column(FontFamily::cases(), 'value'))
                ->default(FontFamily::Arial);
            $table->integer('font_size')->default(12);
            $table->string('title_color')->default('#000000');
            $table->string('text_color')->default('#000000');
            $table->string('primary_color')->default('#FFFFFF');
            $table->string('secondary_color')->default('#666666');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cv_customization');
    }
};
