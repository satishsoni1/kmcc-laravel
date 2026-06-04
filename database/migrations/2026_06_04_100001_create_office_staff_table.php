<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('office_staff', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation');
            $table->string('department')->nullable();
            $table->string('qualification')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedSmallInteger('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('office_staff');
    }
};
