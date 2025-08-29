<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\Lesson\LessonRequest;
use App\Http\Traits\FileSystem;
use App\Models\Content;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    use FileSystem;
    public function show(Course $course, Content $content, Lesson $lesson)
    {
        if ($course->id != $content->course_id || $content->id != $lesson->content_id) {
            return back()->with('error', 'Lesson Not Found');
        }

        return view('dashboard.admin.lessons.show', compact(['course', 'content', 'lesson']));
    }

    public function create(Course $course, Content $content)
    {
        if ($course->id != $content->course_id) {
            return back()->with('error', 'Content Not Found');
        }
        return view('dashboard.admin.lessons.create', compact(['course', 'content']));
    }

    public function store(LessonRequest $request, Course $course, Content $content)
    {
        if ($course->id != $content->course_id) {
            return back()->with('error', 'Content Not Found');
        }
        $data = $request->validated();

        if ($data['lesson_type'] === 'video') {
            $data['video_content'] = $this->uploadVideo('video_content', 'lessons/videos');
            $data['text_content'] = null;
        } else {
            $data['video_content'] = null;
        }

        $content->lessons()->create($data);
        $content->load('lessons');
        return to_route('contents.show', [$course, $content])->with('success', 'Lesson Added Successfully');
    }

    public function edit(Course $course, Content $content, Lesson $lesson)
    {
        if ($course->id != $content->course_id || $content->id != $lesson->content_id) {
            return back()->with('error', 'Lesson Not Found');
        }
        return view('dashboard.admin.lessons.edit', compact(['course', 'content', 'lesson']));
    }

    public function update(LessonRequest $request, Course $course, Content $content, Lesson $lesson)
    {
        if ($course->id != $content->course_id || $content->id != $lesson->content_id) {
            return back()->with('error', 'Lesson Not Found');
        }
        $data = $request->validated();
        if ($data['lesson_type'] === 'video') {
            if ($request->hasFile('video_content')) {
                $data['video_content'] = $this->uploadVideo('video_content', 'lessons/videos');
                $this->deleteFile("lessons/{ $lesson->video_content}");
            } else {
                $data['video_content'] = $lesson->video_content;
            }
            $data['text_content'] = null;
        } else {
            $data['video_content'] = null;
        }
        $lesson->update($data);
        $content->load('lessons');
        return to_route('contents.show', [$course, $content])->with('success', 'Lesson Updated Successfully');
    }

    public function destroy(Course $course, Content $content, Lesson $lesson)
    {
        if ($course->id != $content->course_id || $content->id != $lesson->content_id) {
            return back()->with('error', 'Lesson Not Found');
        }
        if ($lesson->lesson_type === 'video') {
            $this->deleteFile("lessons/{$lesson->video_content}");
        }
        $content->lessons()->where('id', $lesson->id)->delete();
        return back()->with('success', 'Lesson Deleted Successfully');
    }
}
