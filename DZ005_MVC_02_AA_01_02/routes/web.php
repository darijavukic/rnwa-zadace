<?php

use App\Http\Controllers\UserController;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\FacultyController;

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/students', [StudentController::class, 'index'])->name('students');
Route::get('/students/{id}', [StudentController::class, 'edit'])->name('students');

Route::get('/professors', [ProfessorController::class, 'index'])->name('professors');
Route::get('/professors/{id}', [ProfessorController::class, 'edit'])->name('professors');

Route::get('/courses', [CourseController::class, 'index'])->name('courses');
Route::get('/courses/{id}', [CourseController::class, 'edit'])->name('courses');

Route::get('/departments', [DepartmentController::class, 'index'])->name('departments');
Route::get('/departments/{id}', [DepartmentController::class, 'edit'])->name('departments');

Route::get('/faculties', [FacultyController::class, 'index'])->name('faculties');
Route::get('/faculties/{id}', [FacultyController::class, 'edit'])->name('faculties');

Route::get('/titles', [TitleController::class, 'index'])->name('titles');

Route::get('auth/google', [UserController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [UserController::class, 'handleGoogleCallback']);
