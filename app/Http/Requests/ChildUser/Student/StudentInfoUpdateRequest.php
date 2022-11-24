<?php

namespace App\Http\Requests\ChildUser\Student;

use Illuminate\Foundation\Http\FormRequest;

class StudentInfoUpdateRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:25'],
            'last_name' => ['required', 'string', 'max:25'],
            'full_name' => ['required','string', 'max:50'],
            'dob' => ['required','date'],
            'gender' => ['required','string','max:10'],
           ];
    }
}
