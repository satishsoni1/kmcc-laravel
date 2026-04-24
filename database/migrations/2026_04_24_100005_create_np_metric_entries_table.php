<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('np_metric_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('college_id')->constrained('np_colleges')->cascadeOnDelete();
            $table->foreignId('metric_id')->constrained('np_metrics')->cascadeOnDelete();
            $table->foreignId('department_id')->nullable()->constrained('np_departments')->nullOnDelete();
            $table->string('academic_year', 10);
            $table->longText('data_value')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('score', 5, 2)->nullable();
            $table->enum('status', ['not_started', 'draft', 'submitted', 'approved', 'returned'])->default('not_started');
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('reviewer_remarks')->nullable();
            $table->date('deadline')->nullable();
            $table->timestamps();
            $table->unique(['college_id', 'metric_id', 'academic_year']);
        });
    }
    public function down(): void { Schema::dropIfExists('np_metric_entries'); }
};
