<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AlumniJob extends Model
{
    protected $fillable = [
        'user_id',
        'company_name',
        'position',
        'company_address',
        'salary_range',
        'job_start_year',
        'job_end_year',
        'is_current_job',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
