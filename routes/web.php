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

Route::get('/', 'HomeController@home')->name('home');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/test/forceping', 'TestController@forcePing');
Route::get('/test', 'TestController@test')->name('test');

Route::get('/logout', function () {
    Auth::logout();
    return redirect(route('login'));
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
Route::get('/2fa/enable', 'Google2FAController@enableTwoFactor')->name('2fa.enable');
Route::get('/2fa/disable', 'Google2FAController@disableTwoFactor')->name('2fa.disable');
Route::get('/2fa/validate', 'Auth\LoginController@getValidateToken')->name('2fa.form');
Route::post('/2fa/validate', ['middleware' => 'throttle:5', 'uses' => 'Auth\LoginController@postValidateToken'])->name('2fa.validate');

// Personal Data Export
Route::personalDataExports('personal-data-exports');
Route::get('settings/export/personaldata', 'Auth\AccountController@exportPersonalData')->name('settings.personaldata');

// Socialite
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

// Servers
Route::get('/servers', 'ServerController@index')->name('servers.index');
Route::delete('/server/{id}', 'ServerController@destroy')->name('servers.destroy');

// Beginning of the admin routes
// Invites
Route::get('admin/invites', 'Admin\InvitesController@indexInvites')->name('admin.invites');
Route::post('admin/invites/add', 'Admin\InvitesController@addInvite')->name('admin.invites.add');
Route::get('admin/invites/invite/remove/{id}', 'Admin\InvitesController@removeInvite')->name('admin.invites.remove');
Route::get('admin/invites/invite/removeall', 'Admin\InvitesController@removeAllInvites')->name('admin.invites.remove.all');

// Roles
Route::resource('admin/roles', 'Admin\RoleController');

// Users
Route::resource('admin/users', 'Admin\UserController');
// End of the admin routes
