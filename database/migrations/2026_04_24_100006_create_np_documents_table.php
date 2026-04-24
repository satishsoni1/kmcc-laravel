<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('np_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('college_id')->constrained('np_colleges')->cascadeOnDelete();
            $table->foreignId('uploaded_by')->constrained('users');
            $table->foreignId('metric_id')->nullable()->constrained('np_metrics')->nullOnDelete();
            $table->foreignId('department_id')->nullable()->constrained('np_departments')->nullOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('file_path');
            $table->string('file_name');
            $table->string('file_type', 20)->nullable();
            $table->unsignedBigInteger('file_size')->nullable();
            $table->string('academic_year', 10)->nullable();
            $table->json('tags')->nullable();
            $table->unsignedInteger('version')->default(1);
            $table->foreignId('parent_id')->nullable()->constrained('np_documents')->nullOnDelete();
            $table->string('file_hash', 64)->nullable();
            $table->unsignedBigInteger('download_count')->default(0);
            $table->boolean('is_public')->default(false);
            $table->timestamps();
        });

        Schema::create('np_document_criterion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')->constrained('np_documents')->cascadeOnDelete();
            $table->foreignId('criterion_id')->constrained('np_criteria')->cascadeOnDelete();
        });
    }
    public function down(): void {
        Schema::dropIfExists('np_document_criterion');
        Schema::dropIfExists('np_documents');
    }
};
