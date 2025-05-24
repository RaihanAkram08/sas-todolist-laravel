<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskPostRequest extends FormRequest
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
            'task' => 'required|min:5|max:200',
        ];
    }

    public function messages()
    {
        return [
            'task.required' => 'Tugas Harus diisi',
            'task.min' => 'Nama Kategori Minimal 5 Huruf',
            'task.max' => 'Nama Kategori Maksimal 200 Huruf',
        ];
    }
}
