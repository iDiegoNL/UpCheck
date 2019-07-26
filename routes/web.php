<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/test', 'TestController@test')->name('test');

Route::get('/home', function () {
    return redirect('dashboard');
});

Route::get('/logout', function () {
    Auth::logout();
    return Redirect::to('login');
});

Route::resource('monitors', 'MonitorController');

Route::get('monitors/{monitor}/alerts', 'MonitorController@indexAlerts')->name('monitors.alerts.index');

Route::view('/test/verify', 'auth.phone-verification');
Route::post('/test/verify', 'Auth\TwilioController@verifyPhone')->name('verify-phone');
Route::post('/test/verify-code', 'Auth\TwilioController@verifyCode')->name('verify-code');

Route::view('/test/send-sms', 'auth.send-sms');
Route::post('/test/send', 'Auth\TwilioController@verifyPhone')->name('send-sms');

// Profile
Route::get('settings/profile', 'Auth\AccountController@indexProfile')->name('settings.profile');
Route::post('settings/profile', 'Auth\AccountController@updateProfile')->name('settings.profile.update');

// Account
Route::get('settings/account', 'Auth\AccountController@indexAccount')->name('settings.account');
Route::post('settings/account', 'Auth\AccountController@exportAccount')->name('settings.account.export');
Route::delete('settings/account', 'Auth\AccountController@deleteAccount')->name('settings.account.delete');

// Password
Route::get('settings/password', 'Auth\AccountController@indexPassword')->name('settings.password');
Route::post('settings/password', 'Auth\AccountController@updatePassword')->name('settings.password.update');

// Confirm Phone
Route::get('settings/confirm/phone', 'Auth\PhoneVerificationController@index')->name('phone.index');
Route::post('settings/confirm/phone', 'Auth\PhoneVerificationController@sendCode')->name('verify.phone.send');
Route::post('settings/confirm/phone/confirm', 'Auth\PhoneVerificationController@verifyCode')->name('verify.phone.code');

// 2FA (MFA)
Route::get('settings/mfa', 'Auth\AccountController@indexMFA')->name('settings.mfa');
