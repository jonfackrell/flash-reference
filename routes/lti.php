<?php


Route::post('/launch', 'LtiLaunchController')->name('lti.launch');
Route::get('/autoconfig.xml', 'LtiConfigController')->name('lti.config');

Route::middleware(['auth:lti'])->group(function () {
    Route::get('/{institution}/instructor', 'InstructorLtiController')->name('lti.instructor.index');
    Route::get('/{institution}/student', 'StudentLtiController')->name('lti.student.index');
});
