<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('np_ssr_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('college_id')->constrained('np_colleges')->cascadeOnDelete();
            $table->foreignId('criterion_id')->nullable()->constrained('np_criteria')->nullOnDelete();
            $table->string('academic_year', 10)->default('2023-24');
            $table->string('section_key', 80);
            $table->string('title');
            $table->longText('content')->nullable();
            $table->integer('order')->default(0);
            $table->enum('status', ['draft', 'complete', 'review', 'approved'])->default('draft');
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('np_ssr_sections'); }
};
