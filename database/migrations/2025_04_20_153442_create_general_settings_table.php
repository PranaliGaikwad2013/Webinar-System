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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('website_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('gst_number')->nullable();
            $table->string('address')->nullable();
            $table->longText('description')->nullable();
            $table->text('location_url')->nullable();
            $table->string('favicon_logo')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('header_logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
