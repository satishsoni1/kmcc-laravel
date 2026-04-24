<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('naac_documents', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['ssr', 'grading', 'peer_team_report']);
            $table->string('title');
            $table->string('cycle')->nullable();        // e.g. 1st, 2nd, 3rd
            $table->string('academic_year', 20)->nullable();
            $table->string('grade')->nullable();        // A++, A+, A, B++, etc.
            $table->text('description')->nullable();
            $table->string('file_path')->nullable();
            $table->string('file_type', 10)->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('naac_documents');
    }
};
