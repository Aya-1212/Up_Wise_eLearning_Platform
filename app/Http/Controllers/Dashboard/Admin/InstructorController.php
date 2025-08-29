<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\Instructor\AddInstructorRequest;
use App\Http\Requests\Dashboard\Admin\Instructor\EditInstructorRequest;
use App\Http\Traits\FileSystem;
use App\Models\Instructor;
use App\Models\Speciality;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    use FileSystem;
    public function index()
    {
        $instructors = Instructor::cursorPaginate(10);
        return view('dashboard.admin.instructors.index', compact('instructors'));
    }

    public function show(Instructor $instructor)
    {
        return view('dashboard.admin.instructors.show', compact('instructor'));
    }

    public function create()
    {
        $specialities = Speciality::all();
        return view('dashboard.admin.instructors.create', compact('specialities'));
    }

    public function store(AddInstructorRequest $request)
    {
        $data = $request->validated();
        $image_name = $this->uploadImage('instructors');
        $instructor = new Instructor();
        $instructor->name = $data['name'];
        $instructor->email = $data['email'];
        $instructor->speciality_id = $data['speciality_id'];
        $instructor->image = $image_name;
        $instructor->linkedin_url = $data['linkedin_url'];
        $instructor->save();
        return to_route('instructors.index')->with('success', 'Instructor added successfully.');
    }

    public function edit(Instructor $instructor)
    {

        $specialities = Speciality::all();
        return view('dashboard.admin.instructors.edit', compact(['instructor', 'specialities']));
    }

    public function update(EditInstructorRequest $request, Instructor $instructor)
    {
        $data = $request->validated();

        $instructor->name = $data['name'];
        $instructor->email = $data['email'];
        $instructor->speciality_id = $data['speciality_id'];
        $instructor->linkedin_url = $data['linkedin_url'];
        if (isset($data['image'])) {
            $this->deleteFile("/instructors/{$instructor->image}");
            $image_name = $this->uploadImage('instructors');
            $instructor->image = $image_name;
        }
        $instructor->save();
        return to_route('instructors.index')->with('success', 'Instructor Updated Successfully');


    }

    public function destroy(Instructor $instructor)
    {
        $this->deleteFile("/instructors/{$instructor->image}");
        $instructor->delete();
        return back()->with('success', 'Instructor deleted successfully.');
    }
}
