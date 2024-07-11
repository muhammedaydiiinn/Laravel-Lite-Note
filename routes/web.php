<?php

use App\Http\Controllers\NoteController;
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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', [NoteController::class, 'index'])->name('notes.index');
    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
    Route::get('/notes/createPage', [NoteController::class, 'createPage'])->name('notes.createPage');
    Route::post('/notes/addNote', [NoteController::class, 'addNote'])->name('notes.addNote');
    Route::get('/notes/detail/{note_id}', [NoteController::class, 'detail'])->name('notes.detail');
    Route::get('/notes/editPage/{id}', [NoteController::class, 'editPage'])->name('notes.editPage');
    Route::post('/notes/update/{id}', [NoteController::class, 'update'])->name('notes.update');
    Route::delete('/notes/destroy/{id}', [NoteController::class, 'destroy'])->name('notes.destroy');

});

Route::get('/test', function () {
    return view('front.layouts.app');
});
