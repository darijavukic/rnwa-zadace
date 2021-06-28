<?php

    Route::get('index.php', function () {
        IndexController::CreateView('IndexView');
    });

    Route::get('posts',[PostController::class, 'index']);
    Route::get('posts_create',[PostController::class, 'create']);
    Route::get('posts_edit',[PostController::class, 'edit']);

    Route::post('posts',[PostController::class, 'store']);

    Route::put('posts_update',[PostController::class, 'update']);

    Route::delete('posts_delete',[PostController::class, 'delete']);

    Route::get('categories',[CategoryController::class, 'index']);
    Route::get('categories_create',[CategoryController::class, 'create']);
    Route::get('categories_edit',[CategoryController::class, 'edit']);

    Route::post('categories',[CategoryController::class, 'store']);
    
    Route::put('categories_update',[CategoryController::class, 'update']);

    Route::delete('categories_delete',[CategoryController::class, 'delete']);


