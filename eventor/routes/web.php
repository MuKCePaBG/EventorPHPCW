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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('organizations','OrganizationsController');
Route::resource('sporttypes','SporttypeController');
Route::resource('events','EventsController');

Route::any('/index',function(){
    $q = Input::get ( 'q' );
    $organizator = Organizator::where('name','LIKE','%'.$q.'%')->orWhere('founder','LIKE','%'.$q.'%')->get();
    if(count($organizator) > 0)
        return view('welcome')->withDetails($organizator)->withQuery ( $q );
    else return view ('welcome')->withMessage('No Details found. Try to search again !');
});
