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
        Schema::create('form_records', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('group')->nullable();
            $table->text('form_data')->nullable();
            $table->string('ip')->nullable();
            $table->string('city')->nullable();
            $table->boolean('unread')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_records');
    }
};
