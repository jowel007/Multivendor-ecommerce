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
    Route::match(['get','post'],'add-edit-section/{id?}','SectionController@addEditSection');

    //categories
    Route::get('categories','CategoryController@categories');
    Route::post('update-category-status','CategoryController@UpdateCategoryStatus');
    Route::match(['get','post'], 'add-edit-category/{id?}','CategoryController@addEditCategory');
    Route::get('append-categories-level','CategoryController@apendCategoryLevel');
    Route::get('delete-category/{id}','CategoryController@deleteCategory');
    Route::get('delete-category-image/{id}','CategoryController@deleteCategoryImage');

    //brand
    Route::get('brands','BrandController@brands');
    Route::post('update-brand-status','BrandController@UpdateBrandStatus');
    Route::get('delete-brand/{id}','BrandController@DeleteBrand');
    Route::match(['get','post'],'add-edit-brand/{id?}','BrandController@addEditBrand');


    });



});
