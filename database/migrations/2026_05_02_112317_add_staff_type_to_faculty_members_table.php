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
        Schema::table('faculty_members', function (Blueprint $table) {
            $table->string('staff_type')->default('teaching')->after('department'); // teaching | non_teaching
        });
    }

    public function down(): void
    {
        Schema::table('faculty_members', function (Blueprint $table) {
            $table->dropColumn('staff_type');
        });
    }
};
