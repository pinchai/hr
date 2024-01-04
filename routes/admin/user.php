<?php

Route::get('/admin/user', [App\Http\Controllers\UsersController::class, 'index'])
    ->name('index_user');

Route::get('/admin/index_create_user', [App\Http\Controllers\UsersController::class, 'index_create'])
    ->name('index_create_user');

Route::post('/admin/create_user', [App\Http\Controllers\UsersController::class, 'create'])
    ->name('create_user');

Route::get('/admin/confirm_delete', [App\Http\Controllers\UsersController::class, 'confirm_delete'])
    ->name('index_confirm_delete');

Route::post('/admin/delete_user', [App\Http\Controllers\UsersController::class, 'delete'])
    ->name('delete_user');

Route::get('/admin/index_update_user', [App\Http\Controllers\UsersController::class, 'index_update_user'])
    ->name('index_update_user');

Route::post('/admin/update_user', [App\Http\Controllers\UsersController::class, 'update'])
    ->name('update_user');
