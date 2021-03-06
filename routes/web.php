<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){

    // admin login route
    Route::match(['get','post'],'login','AdminController@login');

    Route::group(['middleware'=>['admin']],function(){
    // admin dashboard route without admin
      Route::get('dashboard','AdminController@dashboard');

    //Update admin password
      Route::match(['get', 'post'], 'update-admin-password','AdminController@UpdateAdminPassword');
    //check admin password
      Route::post('check-admin-password','AdminController@CheckAdminPassword');
    //Update admin details
    Route::match(['get', 'post'], 'update-admin-details','AdminController@UpdateAdminDetails');
    //Update vendor details
    Route::match(['get', 'post'], 'update-vendor-details/{slug}','AdminController@UpdateVendorDetails');
    
    //admin logout
      Route::get('logout','AdminController@logout');
      
    });



});
