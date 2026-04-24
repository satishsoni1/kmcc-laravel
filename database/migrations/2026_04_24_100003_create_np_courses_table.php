<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('np_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('college_id')->constrained('np_colleges')->cascadeOnDelete();
            $table->foreignId('department_id')->nullable()->constrained('np_departments')->nullOnDelete();
            $table->string('name');
            $table->string('code', 30)->nullable();
            $table->enum('level', ['UG', 'PG', 'Diploma', 'Certificate', 'PhD'])->default('UG');
            $table->integer('duration_years')->default(3);
            $table->integer('intake_capacity')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('np_courses'); }
};
