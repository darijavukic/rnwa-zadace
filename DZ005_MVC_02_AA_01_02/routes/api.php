<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/user/register', [UserController::class, 'register']);
Route::post('/user/login', [UserController::class, 'login']);

Route::post('/faculty', [FacultyController::class, 'create']);
Route::get('/faculty', [FacultyController::class, 'index']);

Route::post('/student', [StudentController::class, 'create']);
Route::get('/student', [StudentController::class, 'index']);
Route::put('/student/course', [StudentController::class, 'addToCourse']);

Route::post('/course', [CourseController::class, 'create']);
Route::get('/course', [CourseController::class, 'index']);

Route::post('/department', [DepartmentController::class, 'create']);
Route::get('/department', [DepartmentController::class, 'index']);

Route::post('/professor', [ProfessorController::class, 'create']);
Route::get('/professor', [ProfessorController::class, 'index']);

Route::post('/title', [TitleController::class, 'create']);
Route::get('/title', [TitleController::class, 'index']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
