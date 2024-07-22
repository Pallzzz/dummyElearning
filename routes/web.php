<?php

use App\Models\Major;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ModuleController;

//RUTE KE HOME
Route::get('/', [MajorController::class, 'index']);

//Rute ke page course berdasarkan button major
Route::get('/search/course', [CourseController::class, 'searchCourses'])->name('search.courses');


//RUTE COURSE TO MODULE
Route::get('/{major:slug}/{course:slug}', [ModuleController::class, 'index']);

//RUTE BREADCRUMB MODULE TO COURSE(MAJOR)
Route::get('/{major:slug}', [CourseController::class, 'showCoursesBySlug']);

//MODULE
// AJAX RUTE
Route::post('/ajaxCourse/fetchYears', [ModuleController::class, 'fetchYears'])->name('module.fetchYears');
Route::post('/ajaxCourse/fetchExamTypes', [ModuleController::class, 'fetchExamTypes'])->name('module.fetchExamTypes');
Route::post('/ajaxCourse/fetchModuleTypes', [ModuleController::class, 'fetchModuleTypes'])->name('module.fetchModuleTypes');

// Download route
Route::post('/download_module', [ModuleController::class, 'downloadModule'])->name('module.download');






