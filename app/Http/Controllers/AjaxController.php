<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function requestHandler(Request $request)
    {
        switch ($request['type']) {
            case 'request_year':
                $years = Module::where('course_id', $request->course_id)->get('year')->unique('year');
                return response()->json(
                    $years
                );
            case 'request_exam_types':
                $examTypes = Module::where('course_id', $request->course_id)->where('year', $request->year)->get('exam_type')->unique('exam_type');
                return response()->json(
                    $examTypes
                );
            case 'request_module_types':
                $moduleTypes = Module::where('course_id', $request->course_id)->where('year', $request->year)->where('exam_type', $request->exam_type)->get('module_type')->unique('module_type');
                return response()->json(
                    $moduleTypes
                );
        }
    }
}
