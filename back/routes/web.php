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
    return view('index');
});

/*
| This route is to return the one page with the email layout configured with Foundation E-mail,
| after viewing one should copy the source code of this page and convert to INLINER in Foundation E-mail
| https://foundation.zurb.com/emails/inliner-v2.html
*/
Route::get('mailer/{mail}',function($mail){
	return view('mails.content-'.$mail,['data'=>null]);
});
