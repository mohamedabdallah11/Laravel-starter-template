<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'exists:users,email', 'max:255', 'min:3'],
            'password' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.exists' => 'The email does not exist in our records.',
            'email.max' => 'The email may not be greater than 255 characters.',
            'email.min' => 'The email must be at least 3 characters.',
            'password.required' => 'The password is required.',
        ];
    }
}
