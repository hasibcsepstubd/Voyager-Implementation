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



Route::any('/', 'PublicController@home');

Route::group(['prefix' => 'public'], function () {

    Route::any('/home', 'PublicController@home');
    Route::any('/payment-proof', 'PublicController@paymentProof');
    Route::any('/sign-in', 'PublicController@signIn');
    Route::any('/login', 'PublicController@login');
    Route::any('/sign-up', 'PublicController@signUp');

    Route::any('/forget-password', 'PublicController@forgetPassword');
    Route::any('/reset-password', 'PublicController@resetPassword');

    Route::any('/send-message', 'PublicController@sendMessage');

});


Route::group(['prefix' => 'client', 'middleware' => 'auth'], function () {

    Route::any('/dashboard', 'ClientController@dashboard');
    Route::any('/buy', 'ClientController@buy');
    Route::any('/sell', 'ClientController@sell');
    Route::any('/exchange', 'ClientController@exchange');
    Route::any('/exchange-receiver-ajax', 'ClientController@exchangeReceiverAjax');
    Route::any('/exchange-transection', 'ClientController@exchangeTransection');
    Route::any('/history', 'ClientController@history');
    Route::any('/referral', 'ClientController@referral');
    Route::any('/messages', 'ClientController@messages');
    Route::any('/messages-show', 'ClientController@messageShow');
    Route::any('/settings', 'ClientController@settings');
    Route::any('/sign-out', 'ClientController@signOut');

    Route::any('/user-info-update', 'ClientController@userInfoUpdate');
    Route::any('/send-message', 'ClientController@sendMessage');
    Route::any('/message/delete/{id}', 'ClientController@deleteMessage');
    Route::any('/give-review', 'ClientController@giveReview');

    Route::any('/transection', 'ClientController@transection');
    Route::any('/referral-withdraw', 'ClientController@referralWithdraw');

});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



Auth::routes();

Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'Auth\RegisterController@confirmUser'
]);