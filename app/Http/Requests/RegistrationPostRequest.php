<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationPostRequest extends FormRequest
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
            'name' => 'required|min:3|max:25',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:25|max:25|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama minimal 3 karakter',
            'name.max' => 'Nama maksimal 25 karakter',

            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email ditolak',

            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 6 karakter',
            'password.max' => 'Password maksimal 25 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sama'
        ];
    }
}
