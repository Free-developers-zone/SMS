<?php

namespace App\Http\Requests\ChildUser\Student;

use Illuminate\Foundation\Http\FormRequest;

class StudentGuardianInfoUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'guardian' => ['required', 'string', 'max:25'],
            'guardian_phone' => ['required', 'string', 'max:13'],
            'guardian_email' => ['required', 'string', 'email', 'max:255'],
            'guardian_address' => ['required', 'string', 'max:255'],
            'guardian_occupation' => ['required', 'string', 'max:255'],
            'guardian_relationship' => ['required', 'string', 'max:255'],
            'guardian_employer' => ['required', 'string', 'max:255'],
            'guardian_employer_address' => ['required', 'string', 'max:255'],
            'guardian_employer_phone' => ['required', 'string', 'max:13'],
            'guardian_employer_email' => ['required', 'string', 'email', 'max:255'],

        ];
    }
}
