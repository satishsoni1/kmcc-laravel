<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('np_accreditation_cycles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('college_id')->constrained('np_colleges')->cascadeOnDelete();
            $table->string('cycle', 20);
            $table->year('year_of_accreditation');
            $table->string('grade', 10)->nullable();
            $table->string('cgpa', 10)->nullable();
            $table->date('valid_upto')->nullable();
            $table->string('peer_team_visit_date')->nullable();
            $table->text('highlights')->nullable();
            $table->string('certificate_path')->nullable();
            $table->timestamps();
        });

        Schema::create('np_best_practices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('college_id')->constrained('np_colleges')->cascadeOnDelete();
            $table->string('title');
            $table->text('objective')->nullable();
            $table->text('context')->nullable();
            $table->text('practice_description')->nullable();
            $table->text('evidence_of_success')->nullable();
            $table->text('problems_encountered')->nullable();
            $table->string('academic_year', 10)->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });

        Schema::create('np_college_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('college_id')->constrained('np_colleges')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('portal_role', 50)->default('faculty');
            $table->foreignId('department_id')->nullable()->constrained('np_departments')->nullOnDelete();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->unique(['college_id', 'user_id']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('np_college_user');
        Schema::dropIfExists('np_best_practices');
        Schema::dropIfExists('np_accreditation_cycles');
    }
};
