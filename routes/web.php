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

Route::get('/', function () {
    return view('auth/login');
})->name('/');

Auth::routes();

//==========================register admin=============================
Route::get('/register/admin', function () {
    return view('auth.adminRegister');
})->name('register/admin');

Route::get('/home', 'HomeController@index')->name('home');

//---------------------------------------Admin pannel--------------------------------------//
// get admin
Route::get('/admin', 'AdminController@index')->middleware('admin')->name('admin');
// admin profile
Route::get('/admin/profile', 'AdminController@profile')->middleware('admin')->name('admin/profile');
//update password
Route::post('/admin/profile/updatePassword', 'AdminController@updatePassword')->middleware('admin')->name('admin/profile/updatePassword');
//update profile
Route::post('/admin/profile/updateProfile', 'AdminController@updateProfile')->middleware('admin')->name('admin/profile/updateProfile');


//add person
Route::get('/admin/person/addNew', 'AdminController@showAddNewPersonPanel')->middleware('admin')->name('admin/person/addNew');
//add person in DB
Route::post('/admin/person/addNew/add', 'AdminController@personAdd')->middleware('admin');
//view all person table
Route::get('/admin/person/allProfiles', 'AdminController@personProfiles')->middleware('admin')->name('admin/person/allProfiles');
//looking for person profile info
Route::get('/admin/person/allProfiles/view/{id}', 'AdminController@personProfile')->middleware('admin')->name('admin/person/allProfiles/view/');
//delete person
Route::get('/admin/person/delete/{id}', 'AdminController@deletePerson')->middleware('admin')->name('admin/person/delete/');
//update person
Route::get('/admin/person/update/{id}', 'AdminController@ViewUpdatePerson')->middleware('admin')->name('admin/person/update/');
//update person to database
Route::post('/admin/person/update/update', 'AdminController@updatePerson')->middleware('admin')->name('admin/person/update/update');
