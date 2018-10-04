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

// Route::get('/', function () {
//     return view('welcome');
// });
// Authentication Routes...
$this->get('/', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('/login', 'Auth\LoginController@login');
$this->post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/redirect', 'Auth\LoginController@redirectToProvider')->name('redirect');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/data', 'HomeController@datambtech')->name('data');
Route::resource('/data', 'DataController',['as' => 'data']);
Route::resource('/customer', 'CustomerController',['as' => 'customer']);
Route::post('/customer/loaddaerah', 'CustomerController@loadDaerah')->name('customer.loaddaerah');

// Route::resource('/users', 'UsersController',['as' => 'users']);
Route::get('/getkota/{id}','DataController@getKota');
Route::get('/detailpdf/{id}','DataController@detailpdf');
Route::get('/allpdf','DataController@allpdf');

Route::post('customer/sendmail', 'CustomerController@sendMail')->name('customer.sendmail');

// users route
Route::group(['prefix' => '/'], function () {
    Route::get('/users', 'UsersController@index');
    Route::match(['get', 'post'], 'users/create', 'UsersController@create');
    Route::match(['get', 'put'], 'users/update/{id}', 'UsersController@update');
    Route::delete('users/delete/{id}', 'UsersController@delete');
});
// Get Data Datatables
Route::get('datatable/getdata', 'HomeController@getPosts')->name('datatable/getdata');
