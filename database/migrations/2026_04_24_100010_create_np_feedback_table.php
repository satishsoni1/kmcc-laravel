<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('np_feedback_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('college_id')->constrained('np_colleges')->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('target_audience', ['student', 'teacher', 'alumni', 'employer', 'parent'])->default('student');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_anonymous')->default(true);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('academic_year', 10)->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
        });

        Schema::create('np_feedback_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->constrained('np_feedback_forms')->cascadeOnDelete();
            $table->string('question');
            $table->enum('type', ['rating', 'text', 'mcq', 'yes_no'])->default('rating');
            $table->json('options')->nullable();
            $table->boolean('is_required')->default(true);
            $table->integer('order')->default(0);
        });

        Schema::create('np_feedback_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->constrained('np_feedback_forms')->cascadeOnDelete();
            $table->string('respondent_name')->nullable();
            $table->string('respondent_email')->nullable();
            $table->string('respondent_type', 30)->nullable();
            $table->string('academic_year', 10)->nullable();
            $table->string('programme')->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->timestamps();
        });

        Schema::create('np_feedback_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('response_id')->constrained('np_feedback_responses')->cascadeOnDelete();
            $table->foreignId('question_id')->constrained('np_feedback_questions')->cascadeOnDelete();
            $table->text('answer')->nullable();
            $table->unsignedTinyInteger('rating')->nullable();
        });
    }
    public function down(): void {
        Schema::dropIfExists('np_feedback_answers');
        Schema::dropIfExists('np_feedback_responses');
        Schema::dropIfExists('np_feedback_questions');
        Schema::dropIfExists('np_feedback_forms');
    }
};
