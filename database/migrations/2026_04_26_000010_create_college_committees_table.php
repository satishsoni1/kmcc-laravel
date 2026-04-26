<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('college_committees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->default('other'); // naac_criteria | other
            $table->string('academic_year')->default('2025-26');
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('college_committees');
    }
};
