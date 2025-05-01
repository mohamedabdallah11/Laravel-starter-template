<?php

namespace App\Http\Requests;

use Illuminate\Support\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role'=>['required','in:parent'],
            'gender' => ['nullable', 'string','in:male,female,other'],
            'birthdate' => ['nullable', 'date', 'date_format:Y-m-d', 'before_or_equal:' . Carbon::now()->subYears(18)->format('Y-m-d')],


        ];

    }
    public function messages()
    {
        return [
            'name.required' => 'The name is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'email.required' => 'The email is required.',
            'email.string' => 'The email must be a string.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'email.max' => 'The email may not be greater than 255 characters.',
            'password.required' => 'The password is required.',
            'password.confirmed' => 'The password confirmation does not match.',
            'role.required' => 'The role is required.',
            'role.in' => 'The selected role is invalid.',
            'gender.string'=>'the gender must be a string',
            'gender.in'=>'the gender must be one of the following[ male,female,other]',
            'birthdate.date' => 'The birthdate must be a valid date.',
            'birthdate.before_or_equal' => 'You must be at least 18 years old.',

            
        ];
    }
}
