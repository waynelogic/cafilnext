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
        Schema::create('corp_partners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->nullable()->constrained('corp_departments')->nullOnDelete();
            $table->boolean('active')->default(true);
            $table->string('name');
            $table->string('legal_name');
            $table->string('slug')->unique();
            $table->string('relations')->nullable();
            $table->string('type')->nullable();
            $table->string('website')->nullable();
            $table->text('preview_text')->nullable();
            $table->text('description')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corp_partners');
    }
};
