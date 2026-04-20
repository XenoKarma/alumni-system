<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AlumniProfile;

class StudyProgram extends Model
{
    public function alumni()
    {
        return $this->hasMany(AlumniProfile::class);
    }
}
