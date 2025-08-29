<?php

namespace App\Http\Requests\Dashboard\Admin\Lesson;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
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
            'title' => 'required|string|max:255|min:6',
            'description' => 'required|string|min:10',
            'lesson_type' => 'required|in:video,article',
        ];
        if($this->input('lesson_type')==='video'){
            $rules['video_content'] = 'required|mimes:mp4|max:700000';  // max 700MB
            $rules['text_content'] = 'nullable|string|max:5000|min:20'; 
        }else{
            $rules['video_content'] = 'nullable|mimes:mp4|max:700000';
            $rules['text_content'] = 'required|string|max:5000|min:20'; 
        }

        return $rules;
    }
}
