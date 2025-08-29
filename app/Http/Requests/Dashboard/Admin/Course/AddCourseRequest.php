<?php

namespace App\Http\Requests\Dashboard\Admin\Course;

use Illuminate\Foundation\Http\FormRequest;

class AddCourseRequest extends FormRequest
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
            'title' => 'required|string|max:255|min:5',
            'description' => 'required|string|max:1000|min:28',
            'category_id' => 'required|exists:categories,id',
            'instructor_id' => 'required|exists:instructors,id',
            'language' => 'required|in:english,arabic',
            'level' => 'required|in:beginner,intermediate,advanced',
            'price' => 'required|numeric|min:500',
            'image' => 'required|image|mimes:jpeg,png,jpg|file',
        ];
    }
}
