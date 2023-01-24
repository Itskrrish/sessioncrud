<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Api\V1', 'middleware'=>'localization'], function () {

    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::post('send-otp', 'CustomerAuthController@register');
        Route::post('login', 'CustomerAuthController@login');
         Route::get('test', 'CustomerAuthController@test');
           Route::get('dinehomee', 'CustomerAuthController@get_latest_stores');
        
        Route::post('verify-phone', 'CustomerAuthController@verify_phone');
        Route::post('send-phone', 'CustomerAuthController@send_otp');
          Route::post('user-details', 'CustomerAuthController@user_details');
        

       

        Route::post('forgot-password', 'PasswordResetController@reset_password_request');
        Route::post('verify-token', 'PasswordResetController@verify_token');
        Route::put('reset-password', 'PasswordResetController@reset_password_submit');

      

            Route::post('forgot-password', 'DMPasswordResetController@reset_password_request');
            Route::post('verify-token', 'DMPasswordResetController@verify_token');
            Route::put('reset-password', 'DMPasswordResetController@reset_password_submit');
        });
       
        //social login(up comming)
        // Route::post('social-login', 'SocialAuthController@social_login');
        // Route::post('social-register', 'SocialAuthController@social_register');
    

   
       
    
   
    });

