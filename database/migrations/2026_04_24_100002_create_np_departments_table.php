<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('np_departments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('college_id')->constrained('np_colleges')->cascadeOnDelete();
            $table->string('name');
            $table->string('code', 20)->nullable();
            $table->string('hod_name')->nullable();
            $table->string('hod_email')->nullable();
            $table->integer('faculty_count')->default(0);
            $table->integer('student_count')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('np_departments'); }
};
