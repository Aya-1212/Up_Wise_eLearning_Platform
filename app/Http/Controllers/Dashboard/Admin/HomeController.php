<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Course;
use App\Models\Feedback;
use App\Models\Instructor;
use App\Models\Message;
use App\Models\Slider;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $admins = Admin::all()->count();
    $instructors = Instructor::all()->count();
    $categories = Category::all()->count();
    $courses = Course::all()->count();
    $messages = Message::all()->count();
    $contacts = Contact::all()->count();
    $feedbacks = Feedback::all()->count();
    $sliders = Slider::all()->count();
    $users = User::all()->count();
    $specialities = Speciality::all()->count();

    return view('dashboard.admin.index', compact([
      'admins',
      'instructors',
      'categories',
      'courses',
      'messages',
      'contacts',
      'feedbacks',
      'sliders',
      'users',
      'specialities'
    ]));
  }
}
