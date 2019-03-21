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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [
    'as' => 'index',
    function () {
        return view('authPages.login');
    }
]);

Route::get('member/sign/in', [
    'as' => 'memberSignIn',
    function () {
        return view('member.memberLogin');
    }
]);

Route::get('member/sign/up', [
    'as' => 'memberSignUp',
    function () {
        return view('member.memberSignUp');
    }
]);



Route::get('asktojoingroup', [
    'as' => 'askToJoinGroup',
    function () {
        return view('member.askIfToJoinGroup');
    }
])->middleware('member');

Route::post('login', [
    'as' => 'postLogin',
    'uses' => 'UserController@login'
]);

Route::post('signUp', [
    'as' => 'postSignUp',
    'uses' => 'UserController@store'
]);

Route::get('/admin{path}', 'AdminController@adminDashRoute')
    ->where('path', '([A-z\d-\/_.]+)?')
    ->middleware('admin')
    ->name('adminDashHome');

Route::get('/alpha{path}', 'AdminController@alphaDashRoute')
    ->where('path', '([A-z\d-\/_.]+)?')
    ->middleware('alpha')
    ->name('adminDashHome');

Route::get('/member{path}', 'AdminController@memberDashRoute')
    ->where('path', '([A-z\d-\/_.]+)?')
    ->middleware('member')
    ->name('memberDashHome');



Route::get('logout', [
    'as' => 'logout',
    function(){
        Auth::logout();
        return redirect()->route('index');
    }
]);

