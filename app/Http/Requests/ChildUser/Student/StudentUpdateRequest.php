<?php

namespace App\Http\Requests\ChildUser\Student;

use Illuminate\Foundation\Http\FormRequest;

class StudentUpdateRequest extends FormRequest
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
            'reg_no' => ['required','string','max:10'],
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255'],
            'password' => ['required','string','min:8','confirmed'],
            'phone' => ['required','string','max:15'],
            'address' => ['required','string','max:255'],
            'current_school' => ['required','string','max:255'],
        ];
    }
}
