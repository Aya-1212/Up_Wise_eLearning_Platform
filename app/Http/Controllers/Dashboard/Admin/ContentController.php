<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\Content\ContentRequest;
use App\Models\Content;
use App\Models\Course;

class ContentController extends Controller
{
    public function show(Course $course, Content $content)
    {
        $content->load('lessons');
        return view('dashboard.admin.contents.show', compact(['course', 'content']));
    }
    public function create(Course $course)
    {
        return view('dashboard.admin.contents.create', compact('course'));
    }

    public function store(ContentRequest $request, Course $course)
    {
        $data = $request->validated();
        $course->contents()->create($data);
        $course->load(['contents', 'quiz']);
        return to_route('courses.show', $course)->with('success', 'Content Added Successfully');
    }

    public function edit(Course $course, Content $content){
        return view('dashboard.admin.contents.edit',compact([
            'course','content'
        ]));
    }

    public function update(ContentRequest $request,Course $course,Content $content){
        $data = $request->validated();
        if($course->id != $content->course_id){
            return back()->with('error','Content Not Found');
        }
        $content->update($data);
        $course->load(['contents','quiz']);
        return to_route('courses.show',$course)->with('success','Content Updated Successfully');
    }

    public function destroy(Course $course, Content $content)
    {
        if ($course->id != $content->course_id) {
            return back()->with('error', 'Content Not Found');

        }
        $course->contents()->where('id', $content->id)->delete();
        return back()->with('success', 'Content Deleted Successfully');
    }
}
