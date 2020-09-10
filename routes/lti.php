<?php

use App\Http\Controllers\Lti\LtiCardController;
use App\Http\Controllers\Lti\LtiSetController;

Route::get('/autoconfig.xml', 'LtiConfigController')->name('lti.config');

Route::middleware(['lti.launch', 'auth:lti'])->group(function () {

    Route::post('/launch', 'LtiLaunchController')->name('lti.launch');

    Route::get('/{institution}/instructor', 'InstructorLtiController')->name('lti.instructor.index');
    Route::get('/{institution}/student', 'StudentLtiController')->name('lti.student.index');

    Route::get('/{institution}/sets', [LtiSetController::class, 'index'])->name('lti.sets.index');
    Route::post('/{institution}/sets/{set}/flashcards', [LtiSetController::class, 'flashcards'])->name('lti.sets.flashcards');
    Route::post('/cards/{card}/star', [LtiCardController::class, 'star'])->name('lti.card.star');
    Route::post('/courses/{course}/sets/{set}/card/viewed', [LtiCardController::class, 'viewed'])->name('lti.card.viewed');

});
