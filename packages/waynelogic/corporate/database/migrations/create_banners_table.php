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
        Schema::create('corp_banners', function (Blueprint $table) {
            $table->id();
            // Data
            $table->boolean('active')->default(1);
            $table->timestamp('published_at')->nullable();
            $table->text('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->text('text')->nullable();
            $table->string('theme')->nullable();
            $table->text('buttons')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corp_banners');
    }
};
