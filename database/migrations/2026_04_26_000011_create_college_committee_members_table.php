<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('college_committee_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('college_committee_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('role')->default('Member'); // Chairman | Secretary | Member
            $table->unsignedTinyInteger('serial_number')->default(1);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('college_committee_members');
    }
};
