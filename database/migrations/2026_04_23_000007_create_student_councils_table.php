<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('student_councils', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->string('programme')->nullable();
            $table->string('academic_year', 20);
            $table->string('photo_path')->nullable();
            $table->text('bio')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_councils');
    }
};
