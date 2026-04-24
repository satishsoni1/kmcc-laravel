<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('np_criteria', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('number');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('weightage', 5, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::create('np_metrics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('criterion_id')->constrained('np_criteria')->cascadeOnDelete();
            $table->string('code', 20);
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('max_score', 5, 2)->default(0);
            $table->boolean('requires_documents')->default(true);
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('np_metrics');
        Schema::dropIfExists('np_criteria');
    }
};
