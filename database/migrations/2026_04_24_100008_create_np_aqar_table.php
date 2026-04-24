<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('np_aqar_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('college_id')->constrained('np_colleges')->cascadeOnDelete();
            $table->string('academic_year', 10);
            $table->string('title');
            $table->enum('status', ['draft', 'submitted', 'approved', 'published'])->default('draft');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->date('submission_date')->nullable();
            $table->date('approval_date')->nullable();
            $table->string('file_path')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->unique(['college_id', 'academic_year']);
        });

        Schema::create('np_aqar_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aqar_id')->constrained('np_aqar_reports')->cascadeOnDelete();
            $table->foreignId('criterion_id')->nullable()->constrained('np_criteria')->nullOnDelete();
            $table->string('section_key', 50);
            $table->string('title');
            $table->longText('content')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_complete')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('np_aqar_sections');
        Schema::dropIfExists('np_aqar_reports');
    }
};
