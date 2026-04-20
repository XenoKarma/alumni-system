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
        Schema::create('alumni_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('study_program_id')->constrained()->cascadeOnDelete();
            $table->string('nim')->unique();
            $table->string('phone');
            $table->string('email')->unique();
            $table->year('entry_year');
            $table->year('graduation_year');
            $table->enum('status', [
                'bekerja',
                'mencari kerja',
                'entrepreneur',
                'studi lanjut',
                'lainnya'
            ]);
            $table->text('address');
            $table->string('photo')->nullable();
            $table->string('linkedin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni_profiles');
    }
};
