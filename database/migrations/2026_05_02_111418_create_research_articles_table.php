<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('research_articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('authors');
            $table->string('journal_name');
            $table->unsignedSmallInteger('year');
            $table->string('volume')->nullable();
            $table->string('issue')->nullable();
            $table->string('page_no')->nullable();
            $table->string('doi')->nullable();
            $table->string('department_slug')->nullable()->index();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_articles');
    }
};
