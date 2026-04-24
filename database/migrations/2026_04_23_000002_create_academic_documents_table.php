<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('academic_documents', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['academic_calendar', 'timetable', 'class_timetable', 'syllabus']);
            $table->string('title');
            $table->string('academic_year', 20);   // e.g. 2024-25
            $table->string('programme')->nullable();
            $table->string('department')->nullable();
            $table->text('description')->nullable();
            $table->string('file_path');
            $table->string('file_type', 10);
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('academic_documents');
    }
};
