<?php

/*
|--------------------------------------------------------------------------
| Dashboard Application Routes
|--------------------------------------------------------------------------
|
| These routes control the public facing side of the website.
|
*/

Route::controller('/dashboard', DashboardController\Controller::class);

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| These routes handle authentication, registration, and other public user
| routes.
|
*/

Route::controller('/password', Auth\PasswordController::class);
Route::controller('/auth', Auth\AuthController::class);

/*
|--------------------------------------------------------------------------
| Public Application Routes
|--------------------------------------------------------------------------
|
| These routes control the public facing side of the website.
|
*/

Route::get('/storage/{path?}', 'PublicController\Storage@get');
Route::controller('/', PublicController\Controller::class);
