<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index(Major $major)
    {
        $majors = Major::all(); // Mengambil semua jurusan dari database
        return view('home', [
            "title" => $major->name,
            "major" => $major,
            "courses" => $major->courses,
            "majors" => $majors
        ]);
    }
}
// public function index(Major $major){
//     return view("major", [
//         "title" => $major->name,
//         "major" => $major,
//         "courses" => $major->courses
//     ]);
// }

// public function showMajors() {
//     $majors = Major::all();
//     return view('majors.index', compact('majors'));
// }
