<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudyProgram;

class StudyProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudyProgram::insert([

            [
                'faculty' => 'Teknologi',
                'name' => 'Sistem Informasi'
            ],

            [
                'faculty' => 'Teknologi',
                'name' => 'Teknik Informatika'
            ],

            [
                'faculty' => 'Sosial',
                'name' => 'Kesejahteraan Sosial'
            ],

            [
                'faculty' => 'Sosial',
                'name' => 'Ilmu Komunikasi'
            ]

        ]);
    }
}
