<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\Course\AddCourseRequest;
use App\Http\Requests\Dashboard\Admin\Course\EditCourseRequest;
use App\Http\Traits\FileSystem;
use App\Models\Category;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    use FileSystem;
    public function index()
    {
        $courses = Course::cursorPaginate(10);
        return view('dashboard.admin.courses.index',compact('courses'));
    }

    public function show(Course $course){
        $course->load(['contents','quiz']);
        return view('dashboard.admin.courses.show',compact('course'));
    }

    public function create(){
        $categories = Category::all();
        $instructors = Instructor::all();
        return view('dashboard.admin.courses.create',[
            'categories'=>$categories,
            'instructors'=>$instructors
        ]);
    }

    public function store(AddCourseRequest $request){
        $data = $request->validated();
        $course = new Course();
        $image_name = $this->uploadImage('courses');
        $course->title = $data['title'];
        $course->image = $image_name;
        $course->description = $data['description'];
        $course->price = $data['price'];
        $course->category_id = $data['category_id'];
        $course->instructor_id = $data['instructor_id'];
        $course->level = $data['level'];
        $course->language = $data['language'];
        $course->save();
        return to_route('courses.index')->with('success','Course Added Successfully');
    }

    public function edit(Course $course){
        $categories = Category::all();
        $instructors = Instructor::all();
        return view('dashboard.admin.courses.edit',[
            'course'=>$course,
            'categories'=>$categories,
            'instructors'=>$instructors
        ]);
    }

    public function update(EditCourseRequest $request,Course $course){
        $data = $request->validated();
        if($request->hasFile('image')){
            $this->deleteFile("courses/{$course->image}");
            $image_name = $this->uploadImage('courses');
            $course->image = $image_name;
        }
        $course->title = $data['title'];
        $course->description = $data['description'];
        $course->price = $data['price'];
        $course->category_id = $data['category_id'];
        $course->instructor_id = $data['instructor_id'];
        $course->level = $data['level'];
        $course->language = $data['language'];
        $course->save();
        return to_route('courses.index')->with('success','Course Updated Successfully');
    }

    public function destroy(Course $course){
        $this->deleteFile("courses/{$course->image}");
        $course->delete();
        return back()->with('success','Course Deleted Successfully');
    }

    
}
