<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('np_colleges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('short_name', 50)->nullable();
            $table->string('code', 30)->nullable()->unique();
            $table->string('address')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable()->default('Maharashtra');
            $table->string('pin', 10)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('principal_name')->nullable();
            $table->string('iqac_coordinator_name')->nullable();
            $table->string('university_affiliation')->nullable();
            $table->string('ugc_recognition', 50)->nullable();
            $table->string('aishe_code', 30)->nullable();
            $table->year('established_year')->nullable();
            $table->enum('type', ['Government', 'Aided', 'Unaided', 'Autonomous'])->default('Aided');
            $table->string('logo_path')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->string('current_naac_grade', 5)->nullable();
            $table->string('current_cgpa', 10)->nullable();
            $table->year('last_accreditation_year')->nullable();
            $table->year('next_accreditation_year')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('np_colleges'); }
};
