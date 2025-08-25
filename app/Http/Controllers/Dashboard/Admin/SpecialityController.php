<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\Speciality\AddSpecialityRequest;
use App\Http\Requests\Dashboard\Admin\Speciality\EditSpecialityRequest;
use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    public function index()
    {
        $specialities = Speciality::cursorPaginate(10);
        return view('dashboard.admin.specialities.index', compact('specialities'));
    }

    public function show(Speciality $speciality)
    {
        return view('dashboard.admin.specialities.show', compact('speciality'));
    }

    public function add()
    {
        return view('dashboard.admin.specialities.add');
    }

    public function store(AddSpecialityRequest $request)
    {
        $data = $request->validated();
        $speciality = new Speciality();
        $speciality->title = $data['title'];
        $speciality->save();
        return to_route('specialities.index')->with('success', 'Speciality added successfully.');
    }

    public function edit(Speciality $speciality)
    {
        return view('dashboard.admin.specialities.edit', compact('speciality'));
    }

    public function update(EditSpecialityRequest $request, Speciality $speciality)
    {
        $data = $request->validated();
        $speciality->title = $data['title'];
        $speciality->save();
        return to_route('specialities.index')->with('success', 'Speciality updated successfully.');
    }

    public function destroy(Speciality $speciality)
    {
        $speciality->delete();
        return to_route('specialities.index')->with('success', 'Speciality deleted successfully.');
    }
}
