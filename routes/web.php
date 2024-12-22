<?php

use App\Http\Controllers\QuillController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('quill-editor', [QuillController::class, 'index']);
Route::post('quill-editor', [QuillController::class, 'store'])->name('quill.store');
