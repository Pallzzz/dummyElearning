<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index(Request $request, Major $major, Course $course)
    {
        $years = Module::where('course_id', $course->id)->distinct()->pluck('year');
        $exam_types = collect();
        $module_types = collect();
        
        $selectedYear = $request->input('year');
        $selectedExamType = $request->input('exam_type');
        
        if ($selectedYear) {
            $exam_types = Module::where('course_id', $course->id)
                ->where('year', $selectedYear)
                ->distinct()
                ->pluck('exam_type');
        }
        
        if ($selectedYear && $selectedExamType) {
            $module_types = Module::where('course_id', $course->id)
                ->where('year', $selectedYear)
                ->where('exam_type', $selectedExamType)
                ->distinct()
                ->pluck('module_type');
        }

        return view('module', compact('major', 'course', 'years', 'exam_types', 'module_types', 'selectedYear', 'selectedExamType'));
    }
    
    public function downloadModule(Request $request)
    {
        $courseId = $request->input('course_id');
        $year = $request->input('year');
        $examType = $request->input('exam_type');
        $moduleType = $request->input('module_type');

        $module = Module::where('course_id', $courseId)
            ->where('year', $year)
            ->where('exam_type', $examType)
            ->where('module_type', $moduleType)
            ->firstOrFail();

        return redirect($module->download_link);
    }


    public function download(Request $request)
    {
        $targetModule = Module::where('course_id', $request->course_id)
        ->where('year', $request->year)
        ->where('exam_type', $request->exam_type)
        ->where('module_type', $request->module_type)
        ->get('download_link');
        return redirect($targetModule[0]->download_link);
    }

    // public function majorPage(Major $major, Course $course)
    // {
    //     return view('major', [
    //         'major' => $major,
    //         'course' => $course
    //     ]);
    // }

}

// $module = Module::where('course_id', $course->id)->get(); // Asumsi Anda ingin mengambil semua module berdasarkan course_id