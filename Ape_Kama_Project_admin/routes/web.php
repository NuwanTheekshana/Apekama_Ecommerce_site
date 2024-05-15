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
    return view('auth.Login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function ()
{

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/gustlogout', [App\Http\Controllers\HomeController::class, 'gustlogout'])->name('gustlogout');
Route::get('/sub_category', [App\Http\Controllers\categoryController::class, 'sub_category'])->name('sub_category');
Route::post('/sub_cat_add', [App\Http\Controllers\categoryController::class, 'sub_cat_add'])->name('sub_cat_add');
Route::get('/women_category', [App\Http\Controllers\categoryController::class, 'women_category'])->name('women_category');
Route::get('/men_category', [App\Http\Controllers\categoryController::class, 'men_category'])->name('men_category');
Route::get('/kide_category', [App\Http\Controllers\categoryController::class, 'kide_category'])->name('kide_category');
Route::get('/home_category', [App\Http\Controllers\categoryController::class, 'home_category'])->name('home_category');


Route::get('/womenitem/{id}', [App\Http\Controllers\itemcontroller::class, 'womenitem_cat'])->name('womenitem_cat');
Route::get('/menitem/{id}', [App\Http\Controllers\itemcontroller::class, 'menitem_cat'])->name('menitem_cat');
Route::get('/kideitem/{id}', [App\Http\Controllers\itemcontroller::class, 'kideitem_cat'])->name('kideitem_cat');
Route::get('/homeitem/{id}', [App\Http\Controllers\itemcontroller::class, 'homeitem_cat'])->name('homeitem_cat');
Route::post('/item_add', [App\Http\Controllers\itemcontroller::class, 'item_add'])->name('item_add');
Route::post('/update_item', [App\Http\Controllers\itemcontroller::class, 'update_item'])->name('update_item');
Route::get('/remove_item', [App\Http\Controllers\itemcontroller::class, 'remove_item'])->name('remove_item');

// users
Route::get('/find_users', [App\Http\Controllers\user_controller::class, 'find_users'])->name('find_users');
Route::get('/userremove', [App\Http\Controllers\user_controller::class, 'userremove'])->name('userremove');
Route::POST('/update_user', [App\Http\Controllers\user_controller::class, 'update_user'])->name('update_user');
Route::POST('/change_password', [App\Http\Controllers\user_controller::class, 'change_password'])->name('change_password');


// contact_info_jobs
Route::get('/contact_info_jobs', [App\Http\Controllers\contract_info_controller::class, 'contact_info_jobs'])->name('contact_info_jobs');
Route::get('/complere_job/{id}', [App\Http\Controllers\contract_info_controller::class, 'complere_job'])->name('complere_job');

// customer comments
Route::get('/item_comments_job', [App\Http\Controllers\contract_info_controller::class, 'item_comments_job'])->name('item_comments_job');
Route::get('/complete_cust_comment_job/{id}', [App\Http\Controllers\contract_info_controller::class, 'complete_cust_comment_job'])->name('complete_cust_comment_job');
Route::get('/reject_cust_comment_job/{id}', [App\Http\Controllers\contract_info_controller::class, 'reject_cust_comment_job'])->name('reject_cust_comment_job');




});
