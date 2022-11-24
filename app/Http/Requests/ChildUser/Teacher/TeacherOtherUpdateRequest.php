<?php

namespace App\Http\Requests\ChildUser\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class TeacherOtherUpdateRequest extends FormRequest
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
            'first_school' => ['required', 'string', 'max:255'],
            'first_school_year' => ['required', 'string', 'max:255'],
            'other_school' => ['required', 'string', 'max:255'],
            'other_school_year' => ['required', 'string', 'max:255'],
        ];
    }
}
