<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlumniProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'study_program_id' => $this->study_program_id,
            'nim' => $this->nim,
            'phone' => $this->phone,
            'entry_year' => $this->entry_year,
            'graduation_year' => $this->graduation_year,
            'status' => $this->status,
            'address' => $this->address,
            'photo' => $this->photo
                ? asset('storage/' . $this->photo)
                : null,
            'linkedin' => $this->linkedin,
            'study_program' => $this->whenLoaded('studyProgram'),
        ];
    }
}
