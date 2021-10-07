<?php

    Route::get('index.php', function () {
        IndexController::CreateView('IndexView');
    });

    Route::get('faculties',[FacultyController::class, 'index']);
    Route::get('faculties_create',[FacultyController::class, 'create']);
    Route::get('faculties_edit',[FacultyController::class, 'edit']);
    Route::post('faculties',[FacultyController::class, 'store']);
    Route::put('faculties_update',[FacultyController::class, 'update']);
    Route::delete('faculties_delete',[FacultyController::class, 'delete']);

    Route::get('students',[StudentController::class, 'index']);
    Route::get('students_create',[StudentController::class, 'create']);
    Route::get('students_edit',[StudentController::class, 'edit']);
    Route::post('students',[StudentController::class, 'store']);
    Route::put('students_update',[StudentController::class, 'update']);
    Route::delete('students_delete',[StudentController::class, 'delete']);


