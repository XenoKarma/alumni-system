<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AlumniProfile;

class StudyProgram extends Model
{
    protected $fillable = [
        'faculty',
        'name',
    ];
    public function alumni()
    {
        return $this->hasMany(AlumniProfile::class);
    }
}
