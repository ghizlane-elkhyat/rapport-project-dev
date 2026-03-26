<?php

use App\Http\Controllers\FormationController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/formations', [FormationController::class, 'index'])->name('formations.index');
Route::get('/formations/{formation}/students', [FormationController::class, 'students'])->name('formations.students');
