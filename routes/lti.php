<?php

use App\Http\Controllers\Lti\LtiSetController;

Route::post('/launch', 'LtiLaunchController')->name('lti.launch');
Route::get('/autoconfig.xml', 'LtiConfigController')->name('lti.config');

Route::middleware(['auth:lti'])->group(function () {
    Route::get('/{institution}/instructor', 'InstructorLtiController')->name('lti.instructor.index');
    Route::get('/{institution}/student', 'StudentLtiController')->name('lti.student.index');

    Route::get('/{institution}/sets', [LtiSetController::class, 'index'])->name('lti.sets.index');
    Route::post('/{institution}/sets/{set}', [LtiSetController::class, 'show'])->name('lti.sets.show');
});
