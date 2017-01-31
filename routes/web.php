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
Route::resource('decision', 'DecisionController');
Route::get('new', ['as' => 'new', 'uses' => 'DecisionController@newTable'] );
Route::get('/', function () {
    return View('Decision');
});
Route::get('decision', function () {
    return View('Decision');
});
Route::get('/options', function () {
    return View('option');
});
Route::get('/choose', function(){
    return View('choose');
});
Route::post('Added', function () {
    return view('Decision');
});
Route::post('/', 
  ['as' => 'store', 'uses' => 'DecisionController@store']);{
return view('Decision');
  }
