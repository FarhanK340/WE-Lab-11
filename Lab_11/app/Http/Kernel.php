<?php

Route::middleware(['role:student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard']);
});

Route::middleware(['role:teacher'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard']);
});
