<?php
use \Illuminate\Support\Facades\Route;
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

Route::get('/','PageController@home');
Route::get('/about','PageController@about');
Route::get('/contact','PageController@contact');

Route::post('/contact/message','Admin\AdminController@contactAdmin');
/*
 Rute za LOGOVANJE
*/
Route::get('/login','PageController@login');
Route::post('/login','AuthController@doLogin');
Route::get('/register','PageController@register');
Route::post('/register','AuthController@doRegister');

/* RUTE ZA KOMENTARE */

Route::get("/postComment/{postId}", "CommentController@postComment");


Route::get('/gallery','GalleryController@gallery')->name('gallery');
Route::get('/gallery/pagination_page', 'GalleryController@getPagination');
Route::get('/404','PageController@page404');
Route::get("/logout", "AuthController@logout");
Route::get("/gallery/{id}","GalleryController@filter")->where('id','[0-9]+');
Route::get("/gallery/search","GalleryController@search");
Route::get("/sendemail","SendEmailController@index");
Route::post("/sendemail/send","SendEmailController@send");

Route::group(['middleware' => 'isLoggedIn'],function (){
    Route::get("/single/{id}","GalleryController@single")->name('single');
});
/* RUTE ZA ADMIN PANEL */

Route::group(['middleware' => 'AdminMiddleware'],function (){
    Route::get('/admin_page',"Admin\AdminController@index")->name("admin");
    Route::get('/admin_insert',"Admin\UserController@index");
    Route::get('/admin_page/update/{id}',"Admin\UserController@edit")->name('update_user');
    Route::get("/admin/users/{id}/delete", "Admin\UserController@destroy")->name("users.delete");
    Route::post("/admin/users/update", "Admin\UserController@update")->name("users.update");
    Route::get("/admin/users/{id}", "Admin\UserController@show")->name("users.show");
    Route::post("/admin/users/insert", "Admin\UserController@store")->name("users.store");


    Route::get("/admin/gallery", "Admin\GalleryController@index")->name("gallery.index");
    Route::get("/admin/gallery/{id}/delete", "Admin\GalleryController@destroy")->name("gallery.delete");
    Route::post("/admin/gallery/insert", "Admin\GalleryController@store")->name("gallery.store");
    Route::get("/admin/add_post", "Admin\GalleryController@create")->name("add_post");
    Route::get("/admin/gallery/{id}", "Admin\GalleryController@show")->name("gallery.show");
    Route::post("/admin/gallery/update", "Admin\GalleryController@update")->name("gallery.update");
    Route::get("/admin/update_form/{id}","Admin\GalleryController@edit")->name('gallery_update');

    Route::get('/admin/message','Admin\AdminController@showMessage');
    Route::get('/admin/activity',"Admin\AdminController@showActivities")->name('activities');
    Route::get('/admin/filterDate/{vrednost}',"Admin\AdminController@filterActivities");
});
