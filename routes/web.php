<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\NoteController;

//Admin Routes
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\FilesController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/file-search', [HomeController::class, 'search'])->name('file-search');
    Route::get('/show/{id}/file-details', [HomeController::class, 'show'])->name('file.show');

    Route::get('/addfile', [fileController::class, 'addfile'])->name('addfile');
    Route::post('/file/store', [fileController::class, 'store'])->name('file.store');
    Route::get('/file/{id}/edit', [fileController::class, 'edit'])->name('file.edit');
    Route::patch('/file/{id}/update', [fileController::class, 'update'])->name('file.update');
    Route::delete('/file/{id}/destroy', [fileController::class, 'destroy'])->name('file.destroy');

    //Notes
    Route::post('/notes/{file_id}/store', [NoteController::class, 'store'])->name('note.store');
    Route::patch('/notes/{file_id}/editNotes', [NoteController::class, 'editNotes'])->name('note.edit');

    //Admin Routes

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function(){
        //User
        Route::get('/users', [UsersController::class, 'index'])->name('users');
        //Files
        Route::get('/files', [FilesController::class, 'index'])->name('files');
    });

});
