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
        Schema::create('corp_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->nullable()->constrained('corp_partners')->nullOnDelete();

            $table->boolean('active')->default(true);
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('preview_text')->nullable();
            $table->text('content')->nullable();

            $table->string('sphere')->nullable();
            $table->timestamp('published_at')->nullable();

            $table->timestamps();
        });

        Schema::create('corp_project_service', function($obTable)
        {
            $obTable->integer('project_id')->unsigned();
            $obTable->integer('service_id')->unsigned();
            $obTable->primary(['project_id', 'service_id']);
            $obTable->integer('sort_order')->nullable();
        });
        Schema::create('corp_project_employee', function($obTable)
        {
            $obTable->integer('project_id')->unsigned();
            $obTable->integer('employee_id')->unsigned();
            $obTable->primary(['project_id', 'employee_id']);
            $obTable->integer('sort_order')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corp_projects');
        Schema::dropIfExists('corp_project_service');
        Schema::dropIfExists('corp_project_employee');
    }
};
