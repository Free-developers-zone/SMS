<?php

namespace App\Http\Requests\ChildUser\Administration;

use Illuminate\Foundation\Http\FormRequest;

class AdministrationCreateRequest extends FormRequest
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
            'role_id' => ['required','integer'],
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255','unique:administrations'],
            'password' => ['required','string','min:8','confirmed'],
            'phone' => ['required','string','max:15'],
            'address' => ['required','string','max:255'],
        ];
    }
    public function messages()
    {
        return [
            'reg_no.required' => 'Registration number is required',
            'reg_no.string' => 'Registration number must be a string',
            'reg_no.max' => 'Registration number must be less than 10 characters',
            'role_id.required' => 'Role is required',
            'role_id.integer' => 'Role must be an integer',
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name must be less than 255 characters',
            'email.required' => 'Email is required',
            'email.string' => 'Email must be a string',
            'email.email' => 'Email must be a valid email address',
            'email.max' => 'Email must be less than 255 characters',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password is required',
            'password.string' => 'Password must be a string',
            'password.min' => 'Password must be at least 8 characters',
            'password.confirmed' => 'Password confirmation does not match',
            'phone.required' => 'Phone number is required',
            'phone.string' => 'Phone number must be a string',
            'phone.max' => 'Phone number must be less than 15 characters',
            'address.required' => 'Address is required',
            'address.string' => 'Address must be a string',
            'address.max' => 'Address must be less than 255 characters',
        ];
    }
}
