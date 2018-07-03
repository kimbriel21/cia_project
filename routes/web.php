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
Route::get('/a', function () {
    return view('member.layout_member');
});
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@submit_login');
Route::get('/register', 'RegisterController@index');
Route::post('/register', 'RegisterController@submit_register');

//dashboard
Route::any('/dashboard', 'Member\DashboardController@dashboard');
Route::any('/sample_ajax', 'Member\DashboardController@sample_ajax');

//members
Route::any('/members', 'Member\MemberController@index');
Route::any('/member_list_table', 'Member\MemberController@member_list_table');
Route::any('/add_member_modal', 'Member\MemberController@add_member_modal');
Route::any('/member_load_table', 'Member\MemberController@member_load_table');
Route::post('/member_add', 'Member\MemberController@member_add');
Route::post('/view_member_modal/{member_id}' , 'Member\MemberController@view_member_modal');
Route::post('/update_member' , 'Member\MemberController@update_member');
Route::post('/member_delete' , 'Member\MemberController@member_delete');

