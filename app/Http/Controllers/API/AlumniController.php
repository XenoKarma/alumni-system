<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AlumniProfile;
use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAlumniProfileRequest;
use App\Http\Resources\AlumniProfileResource;

class AlumniController extends Controller
{
    public function store(StoreAlumniProfileRequest $request)
    {
        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')
                ->store('profile', 'public');
        }

        $profile = AlumniProfile::create([
            'user_id' => auth()->id(),
            'nim' => $request->nim,
            'phone' => $request->phone,
            'study_program_id' => $request->study_program_id,
            'entry_year' => $request->entry_year,
            'graduation_year' => $request->graduation_year,
            'status' => $request->status,
            'address' => $request->address,
            'photo' => $photoPath,
            'linkedin' => $request->linkedin
        ]);
        return new AlumniProfileResource($profile);
    }

    public function profile()
    {
        $profile = auth()->user()->profile;
        if (!$profile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }
        return new AlumniProfileResource($profile);
    }

    public function update(StoreAlumniProfileRequest $request)
    {
        $profile = auth()->user()->profile;

        if (!$profile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }
        if ($request->hasFile('photo')) {
            if ($profile->photo) {
                Storage::disk('public')->delete($profile->photo);
            }

            $photoPath = $request->file('photo')
                ->store('profile', 'public');

            $profile->photo = $photoPath;
        }

        $profile->update([
            'nim' => $request->nim,
            'phone' => $request->phone,
            'study_program_id' => $request->study_program_id,
            'entry_year' => $request->entry_year,
            'graduation_year' => $request->graduation_year,
            'status' => $request->status,
            'address' => $request->address,
            'linkedin' => $request->linkedin
        ]);

        return new AlumniProfileResource($profile);
    }

    public function index()
    {
        $alumni = AlumniProfile::with('studyProgram')->paginate(10);
        return AlumniProfileResource::collection($alumni);
    }

    public function studyPrograms()
    {
        return StudyProgram::all();
    }


}
