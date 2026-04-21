<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AlumniProfile;
use App\Models\User;
use App\Http\Resources\AlumniProfileResource;

class AdminController extends Controller
{
    public function dashboard()
    {
        return response()->json([
            'total_alumni' => AlumniProfile::count(),
            'working' => AlumniProfile::where('status', 'bekerja')->count(),
            'seeking_job' => AlumniProfile::where('status', 'mencari kerja')->count(),
            'entrepreneur' => AlumniProfile::where('status', 'entrepreneur')->count(),
            'study_s2' => AlumniProfile::where('status', 'studi lanjut')->count()
        ]);
    }

    public function alumni()
    {
        $alumni = AlumniProfile::with('user', 'studyProgram')
            ->paginate(10);

        return AlumniProfileResource::collection($alumni);
    }

    public function alumniByStatus($status)
    {
        $alumni = AlumniProfile::where('status', $status)
            ->with('studyProgram')
            ->paginate(10);

        return AlumniProfileResource::collection($alumni);
    }
}
