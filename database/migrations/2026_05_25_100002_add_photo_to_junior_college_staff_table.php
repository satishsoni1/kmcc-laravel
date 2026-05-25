<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('junior_college_staff', function (Blueprint $table) {
            $table->string('photo')->nullable()->after('subjects');
        });
    }

    public function down(): void
    {
        Schema::table('junior_college_staff', function (Blueprint $table) {
            $table->dropColumn('photo');
        });
    }
};
