<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Major $major, Course $course)
    {
        return view('course', [
            'major' => $major,
            'course' => $course,
        ]);
    }

    public function searchCourses(Request $request)
    {
        $majorId = $request->input('major_id');
        $course = Course::where('major_id', $majorId)->get();
        $major = Major::find($majorId);
        return view('course', [
            'course' => $course,
            'major' => $major
        ]);
    }

    public function showCoursesBySlug($slug)
    {
        $major = Major::where('slug', $slug)->firstOrFail();
        $course = Course::where('major_id', $major->id)->get();
        return view('course', [
            'course' => $course,
            'major' => $major
        ]);
    }
}
