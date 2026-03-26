<?php

use App\Http\Controllers\FormationController;
use App\Http\Controllers\ReportController;
use App\Models\Formation;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/formations', [FormationController::class, 'apiIndex']);
Route::get('/formations/{id}/students', [FormationController::class, 'apiStudents']);
Route::post('/reports', [ReportController::class, 'apiStore']);
Route::get('/reports/{report}/download', [ReportController::class, 'apiDownload']);
Route::post('/reports/{report}/send-email', [ReportController::class, 'apiSendEmail']);
Route::get('/reports', [ReportController::class, 'apiHistory']);
Route::get('/formations/{id}/reports', [ReportController::class, 'apiReportsByFormation']);
Route::get('/formations/{formation_id}/students/{student_id}/reports', [ReportController::class, 'apiReportsByStudent']);

Route::get('/students/{id}', function ($id) {
    return Student::findOrFail($id);
});

Route::get('/formations/{id}', function ($id) {
    return Formation::findOrFail($id);
});
