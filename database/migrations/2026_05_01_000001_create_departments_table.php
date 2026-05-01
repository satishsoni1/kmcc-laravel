<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('faculty_group'); // arts | commerce | science | inter
            $table->string('icon')->default('fa-book');
            $table->string('color')->default('blue');
            $table->integer('established_year')->nullable();
            $table->text('about')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->text('goals')->nullable();
            $table->text('highlights')->nullable(); // JSON array of bullet points
            $table->text('programmes_offered')->nullable(); // JSON array
            $table->integer('intake_ug')->nullable();
            $table->integer('intake_pg')->nullable();
            $table->boolean('has_phd')->default(false);
            $table->string('hod_name')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
