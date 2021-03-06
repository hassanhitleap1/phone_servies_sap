<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::patch('settings/profile', 'Settings\ProfileController@update');
    Route::patch('settings/password', 'Settings\PasswordController@update');

    Route::get('/phones', 'Phones\PhoneController@index');
    Route::get('/phones/active/{id}', 'Phones\PhoneController@active');
    Route::get('/phones/desactive/{id}', 'Phones\PhoneController@desactive');
    Route::get('/phones/achieved', 'Phones\PhoneController@achieved');
    Route::get('/phones/add_action_call/{id}', 'Phones\ActionPhoneUsersController@addCall');
    Route::get('/phones/get_action_data/{id}', 'Phones\ActionPhoneUsersController@getActionData');
    Route::post('/phones/add_action_note/{id}', 'Phones\ActionPhoneUsersController@addNote');
});

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');

    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::post('email/verify/{user}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::post('email/resend', 'Auth\VerificationController@resend');

    Route::post('oauth/{driver}', 'Auth\OAuthController@redirectToProvider');
    Route::get('oauth/{driver}/callback', 'Auth\OAuthController@handleProviderCallback')->name('oauth.callback');

   
});

