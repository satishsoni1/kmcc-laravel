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
        \DB::statement("ALTER TABLE committee_members MODIFY COLUMN committee_type ENUM('governing_body','cdc','academic_council','finance_committee','board_of_studies','iqac','autonomy') NOT NULL");
    }

    public function down(): void
    {
        \DB::statement("ALTER TABLE committee_members MODIFY COLUMN committee_type ENUM('governing_body','cdc','academic_council','finance_committee','board_of_studies','iqac') NOT NULL");
    }
};
