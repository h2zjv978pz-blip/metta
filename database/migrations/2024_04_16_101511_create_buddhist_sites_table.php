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
        Schema::create('buddhist_sites', function (Blueprint $table) {
            $table->id();
            $table->string('name', 80)->index();
            $table->string('location_name')->nullable();
            $table->json('description')->nullable();
            $table->unsignedInteger('country_id')->nullable()->index();
            $table->string('feature_image')->nullable();
            $table->json('media')->nullable();
            $table->text('map_location')->nullable();
            $table->json('props')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buddhist_sites');
    }
};
