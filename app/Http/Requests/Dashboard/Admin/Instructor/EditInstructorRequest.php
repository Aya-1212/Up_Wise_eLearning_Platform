<?php

namespace App\Http\Requests\Dashboard\Admin\Instructor;

use Illuminate\Foundation\Http\FormRequest;

class EditInstructorRequest extends FormRequest
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
    { $rules =[
            'name' => 'required|string|min:3|max:155',
            'email' => 'required|email|max:255',
            'speciality_id' => 'required|string|exists:specialities,id',
            'linkedin_url' => [
                'required',
                'max:255',
                'regex:/^(https?:\/\/)?(www\.)?linkedin\.com\/.*$/'
            ],
        ];
        if ($this->hasFile('image')) {
            $rules['image'] = 'image|mimes:jpeg,png,jpg|file';
        }
        return $rules;
    }
}
