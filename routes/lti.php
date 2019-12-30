<?php


Route::post('/launch', 'LtiLaunchController')->name('lti.launch');
Route::get('/autoconfig.xml', 'LtiConfigController')->name('lti.config');
