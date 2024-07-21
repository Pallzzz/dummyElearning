<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
 public function index(Major $major, Course $course)
{
    $modules = Module::where('course_id', $course->id)->get();
    return view('module', [
        'title' => $course->name,
        'major' => $major,
        'course' => $course,
        'modules' => $modules
    ]);
}

    public function fetchYears(Request $request)
    {
        $years = Module::where('course_id', $request->course_id)
            ->distinct()
            ->pluck('year');
        return response()->json($years);
    }

    public function fetchExamTypes(Request $request)
    {
        $examTypes = Module::where('course_id', $request->course_id)
            ->where('year', $request->year)
            ->distinct()
            ->pluck('exam_type');
        return response()->json($examTypes);
    }

    public function fetchModuleTypes(Request $request)
    {
        $moduleTypes = Module::where('course_id', $request->course_id)
            ->where('year', $request->year)
            ->where('exam_type', $request->exam_type)
            ->distinct()
            ->pluck('module_type');
        return response()->json($moduleTypes);
    }

    public function downloadModule(Request $request)
    {
        $module = Module::where('course_id', $request->course_id)
            ->where('year', $request->year)
            ->where('exam_type', $request->exam_type)
            ->where('module_type', $request->module_type)
            ->firstOrFail();

        return redirect($module->download_link);
    }
}
