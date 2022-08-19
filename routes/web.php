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

    // admins / subadmins /vendors
    Route::get('admins/{type?}','AdminController@admins');

    //view vendor details
    Route::get('view-vendor-details/{id}','AdminController@ViewVendorDetails');

    //admin update status 
    Route::post('update-admin-status','AdminController@UpdateAdminStatus');


    //admin logout
    Route::get('logout','AdminController@logout');

    //section
    Route::get('sections','SectionController@sections');
    Route::post('update-section-status','SectionController@UpdateSectionStatus');
    Route::get('delete-section/{id}','SectionController@DeleteSection');
      
    });



});
