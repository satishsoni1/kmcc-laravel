<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('np_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('college_id')->constrained('np_colleges')->cascadeOnDelete();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('criterion_id')->nullable()->constrained('np_criteria')->nullOnDelete();
            $table->foreignId('metric_id')->nullable()->constrained('np_metrics')->nullOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium');
            $table->enum('status', ['open', 'in_progress', 'review', 'approved', 'closed'])->default('open');
            $table->date('due_date')->nullable();
            $table->string('academic_year', 10)->nullable();
            $table->timestamps();
        });

        Schema::create('np_task_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained('np_tasks')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
        });

        Schema::create('np_task_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained('np_tasks')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users');
            $table->text('comment');
            $table->string('attachment_path')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('np_task_comments');
        Schema::dropIfExists('np_task_user');
        Schema::dropIfExists('np_tasks');
    }
};
