<?php

namespace App\Http\Requests\Dashboard\Admin\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddAdminRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email|max:255',
            'password' => 'required|string|min:8|confirmed',
            'is_super' => 'required|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg|file',
        ];
    }
}
