<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAlumniProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nim' => 'required|unique:alumni_profiles',
            'study_program_id' => 'required',
            'phone' => 'required',
            'entry_year' => 'required',
            'graduation_year' => 'required',
            'status' => 'required',
            'address' => 'required',
            'linkedin' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ];
    }
}
