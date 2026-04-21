<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('study_programs', function (Blueprint $table) {
            $table->id();
            $table->enum('faculty', [
                'Teknologi',
                'Sosial'
            ]);
            $table->enum('name', [
                'Sistem Informasi',
                'Teknik Informatika',
                'Kesejahteraan Sosial',
                'Ilmu Komunikasi'
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_programs');
    }
};
