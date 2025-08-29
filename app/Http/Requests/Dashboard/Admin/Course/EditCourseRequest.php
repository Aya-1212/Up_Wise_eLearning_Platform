<?php

namespace App\Http\Requests\Dashboard\Admin\Course;

use Illuminate\Foundation\Http\FormRequest;

class EditCourseRequest extends FormRequest
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
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'instructor_id' => 'required|exists:instructors,id',
            'language' => 'required|string|in:english,arabic',
            'level' => 'required|in:beginner,intermediate,advanced',
            'price' => 'required|numeric|min:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ];
        return $rules;
    }
}
