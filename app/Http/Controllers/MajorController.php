<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index(Major $major)
    {
        //take all from database major
        $majors = Major::all();
        return view('home', [
            "title" => $major->name,
            "major" => $major,
            "courses" => $major->courses,
            "majors" => $majors
        ]);
    }
}

