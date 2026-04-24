<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('admissions_prospectus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('academic_year', 20);
            $table->text('description')->nullable();
            $table->string('file_path')->nullable();
            $table->string('file_type', 10)->nullable();
            $table->string('external_link')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admissions_prospectus');
    }
};
