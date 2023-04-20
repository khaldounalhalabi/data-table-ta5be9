<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/test' , [\App\Http\Controllers\Controller::class , 'test']) ;
Route::get('/', function () {
    return view('welcome');
});
Route::get('users/data', [UsersController::class, 'data'])->name('user.data');
Route::resource('/users',UsersController::class);
Route::delete('/users/image/{id}/delete' , [UsersController::class , 'deleteImage'])->name('user.image.delete') ;
Route::delete('/users/{user_id}/friends/{friend_id}/remove' , [UsersController::class , 'deleteFriend'])->name('user.remove.friend') ;
