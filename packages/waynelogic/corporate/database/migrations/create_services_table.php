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
        Schema::create('corp_services', function (Blueprint $table) {
            $table->id();
            // Relations
            $table->foreignId('category_id')->nullable()->constrained('corp_services_categories')->nullOnDelete();
            $table->boolean('active')->default(false);
            // Main Data
            $table->string('name');
            $table->string('slug')->unique()->nullable();
            $table->text('preview_text')->nullable();
            $table->longText('description')->nullable();
            // Content
            $table->longText('content')->nullable();
            // Meta
            $table->string('deadline')->nullable();
            $table->string('suitable_for')->nullable();

            // Price
            $table->decimal('price', 10, 2)->nullable();
            $table->string('price_type')->nullable();
            $table->decimal('old_price', 10, 2)->nullable();
            // Seo
            $table->string('seo_title', 60)->nullable();
            $table->string('seo_description', 160)->nullable();
            $table->integer('sort_order')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corp_services');
    }
};
