<?php

namespace App\Http\Requests\Dashboard\Admin\Instructor;

use Illuminate\Foundation\Http\FormRequest;

class AddInstructorRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:155',
            'email' => 'required|email|max:255|unique:instructors,email',
            'speciality_id' => 'required|string|exists:specialities,id',
            'image' => 'required|image|mimes:jpeg,png,jpg|file',
            'linkedin_url' => [
                'required',
                'max:255',
                'regex:/^(https?:\/\/)?(www\.)?linkedin\.com\/.*$/'
            ],
        ];
    }
}
