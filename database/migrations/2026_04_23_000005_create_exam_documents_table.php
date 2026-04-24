<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('exam_documents', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['calendar', 'exam_form', 'hall_ticket', 'result']);
            $table->string('title');
            $table->string('academic_year', 20);
            $table->string('semester')->nullable();     // Sem I, Sem II, etc.
            $table->string('programme')->nullable();
            $table->text('description')->nullable();
            $table->string('file_path')->nullable();
            $table->string('file_type', 10)->nullable();
            $table->string('external_link')->nullable(); // for results linked externally
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_documents');
    }
};
