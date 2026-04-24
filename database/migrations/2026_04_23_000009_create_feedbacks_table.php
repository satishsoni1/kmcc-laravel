<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('programme')->nullable();
            $table->string('year_of_study')->nullable();
            $table->enum('feedback_type', ['teaching', 'infrastructure', 'library', 'sports', 'canteen', 'general'])->default('general');
            $table->tinyInteger('rating')->default(3); // 1-5
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
