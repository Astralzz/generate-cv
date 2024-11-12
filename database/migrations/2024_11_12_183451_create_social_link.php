<?php

use App\Enums\SocialLinkPlatform;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('social_link', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->constrained('personal_info')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->enum('platform', array_column(SocialLinkPlatform::cases(), 'value'));
            $table->string('url');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_link');
    }
};
