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
        Schema::create('corp_departments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('corp_departments')->nullOnDelete();
            $table->boolean('active')->default(true);
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('preview_text')->nullable();
            $table->text('description')->nullable();

            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->string('address')->nullable();
            $table->string('coordinates')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corp_departments');
    }
};
