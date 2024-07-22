<?php

use App\Models\Major;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ModuleController;

// Route::get('/', function () {
//     return view('home');
// });

//RUTE KE HOME
Route::get('/', [MajorController::class, 'index']);

//Rute ke page course berdasarkan button major
Route::get('/search/course', [CourseController::class, 'searchCourses'])->name('search.courses');


//RUTE COURSE TO MODULE
Route::get('/{major:slug}/{course:slug}', [ModuleController::class, 'index']);

//RUTE BREADCRUMB MODULE TO COURSE(MAJOR)
Route::get('/{major:slug}', [CourseController::class, 'showCoursesBySlug']);

//MODULE
// AJAX routes
Route::post('/ajaxCourse/fetchYears', [ModuleController::class, 'fetchYears'])->name('module.fetchYears');
Route::post('/ajaxCourse/fetchExamTypes', [ModuleController::class, 'fetchExamTypes'])->name('module.fetchExamTypes');
Route::post('/ajaxCourse/fetchModuleTypes', [ModuleController::class, 'fetchModuleTypes'])->name('module.fetchModuleTypes');

// Download route
Route::post('/download_module', [ModuleController::class, 'downloadModule'])->name('module.download');


//HOME
// Route::get('/{course:slug}', [CourseController::class,'searchCourse']);

// Route::get('/course', [CourseController::class, 'index']);


// Route::get('/{majors:slug}/{courses:slug}', [CourseController::class, 'index']);

//rute breadcrumbs course
// Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

//rute course
// Route::get('/course', function(Major $majors){ 
//     return view('course', ['title' => $majors->slug]);
// });

//rute dari course ke module
// Route::get('/{course:slug}', [ModuleController::class, 'index']);
// Route::get('/module/{course:slug}', [ModuleController::class, 'index'])->name('index');

// Route::get('/{major:slug}/{course:slug}', [ModuleController::class, 'index']);

//rute breadcrumb module
// Route::get('/{majors:slug}', [CourseController::class, 'index']);

// Route::get('/{major:slug}', [CourseController::class, 'searchCourses'])->name('search.courses');

// Route::get('/{major:slug}', [CourseController::class, 'index']);


// Route::get('/{major:slug}/{course:slug}/{module:slug}', [ModuleController::class, 'index']);
// Route::get('/{major:slug}/{course:slug}', [CourseController::class, 'index'])->name('course.index');
// Route::get('/{major:slug}', [CourseController::class, 'index'])->name('course.index');


// Route::get('/{major:slug}/{course:slug}/{module:slug}', [ModuleController::class, 'index']);
// Route::get('/search-courses', [CourseController::class, 'searchCourses'])->name('search.courses');



// Route::get('/{course:slug}', function(Course $course){ 
//     return view('course', ['title' => $majors->slug]);
// });






