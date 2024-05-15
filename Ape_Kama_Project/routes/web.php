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


Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome']);

// subscribe feild
Route::POST('/subscribe_mail', [App\Http\Controllers\custcontroller::class, 'subscribe_mail'])->name('subscribe_mail');


// gust search feilds
Route::POST('/search_form_gust', [App\Http\Controllers\search_controller::class, 'search_form_gust'])->name('search_form_gust');

Route::get('/category/women', function () {
    return view('category.women');
});

// Route::get('/women_category', [pagecontroller::class, 'women_category']);
// Route::get('/women_category', 'pagecontroller@women_category')->name('women_category');

Auth::routes();
Route::POST('/cust_data_validate', [App\Http\Controllers\custcontroller::class, 'cust_data_validate'])->name('cust_data_validate');
Route::get('/cust_register', [App\Http\Controllers\custcontroller::class, 'cust_register'])->name('cust_register');

Route::group(['middleware' => 'auth'], function ()
{
Route::get('/home', [App\Http\Controllers\pagecontroller::class, 'index'])->name('home');
Route::get('/women_category', [App\Http\Controllers\pagecontroller::class, 'women_category'])->name('women_category');
Route::get('/men_category', [App\Http\Controllers\pagecontroller::class, 'men_category'])->name('men_category');
Route::get('/kids_category', [App\Http\Controllers\pagecontroller::class, 'kids_category'])->name('kids_category');
Route::get('/homeLife_category', [App\Http\Controllers\pagecontroller::class, 'homeLife_category'])->name('homeLife_category');
Route::get('/New_arrivals', [App\Http\Controllers\pagecontroller::class, 'New_arrivals'])->name('New_arrivals');
Route::get('/best_selling', [App\Http\Controllers\pagecontroller::class, 'best_selling'])->name('best_selling');

Route::get('/women_cat_item/{id}', [App\Http\Controllers\pagecontroller::class, 'women_cat_item'])->name('women_cat_item');
Route::get('/men_cat_item/{id}', [App\Http\Controllers\pagecontroller::class, 'men_cat_item'])->name('men_cat_item');
Route::get('/kide_cat_item/{id}', [App\Http\Controllers\pagecontroller::class, 'kide_cat_item'])->name('kide_cat_item');
Route::get('/home_cat_item/{id}', [App\Http\Controllers\pagecontroller::class, 'home_cat_item'])->name('home_cat_item');

Route::post('/login_page', [App\Http\Controllers\custcontroller::class, 'login_page'])->name('login_page');


Route::post('/addtocart', [App\Http\Controllers\addtocart_controller::class, 'addtocart'])->name('addtocart');
Route::post('/addtocart_fav', [App\Http\Controllers\addtocart_controller::class, 'addtocart_fav'])->name('addtocart_fav');
Route::get('/addtocartpage', [App\Http\Controllers\addtocart_controller::class, 'addtocartpage'])->name('addtocartpage');
Route::get('/addtocart_itm_remove', [App\Http\Controllers\addtocart_controller::class, 'addtocart_itm_remove'])->name('addtocart_itm_remove');

Route::post('/update_cart', [App\Http\Controllers\addtocart_controller::class, 'update_cart'])->name('update_cart');
Route::get('/checkout', [App\Http\Controllers\addtocart_controller::class, 'checkout'])->name('checkout');
Route::get('/check_itm_qty', [App\Http\Controllers\addtocart_controller::class, 'check_itm_qty'])->name('check_itm_qty');

//product details
Route::get('product_details/{id}', [App\Http\Controllers\addtocart_controller::class, 'product_details'])->name('product_details');

// place order
Route::post('/placeorder', [App\Http\Controllers\checkout_controller::class, 'placeorder'])->name('placeorder');
Route::post('/placeorder_buy', [App\Http\Controllers\checkout_controller::class, 'placeorder_buy'])->name('placeorder_buy');

//payment complete
Route::get('/payment_success', [App\Http\Controllers\checkout_controller::class, 'payment_success'])->name('payment_success');

//buynow
Route::post('/buynow', [App\Http\Controllers\checkout_controller::class, 'buynow'])->name('buynow');

// about
Route::get('/contact', [App\Http\Controllers\about_controller::class, 'contact'])->name('contact');
Route::get('/about_us', [App\Http\Controllers\about_controller::class, 'about_us'])->name('about_us');

// privacy policy
Route::get('/privacy_policy', [App\Http\Controllers\about_controller::class, 'privacy_policy'])->name('privacy_policy');
Route::get('/terms_conditions', [App\Http\Controllers\about_controller::class, 'terms_conditions'])->name('terms_conditions');

// payment method

Route::get('/payment_method', [App\Http\Controllers\about_controller::class, 'payment_method'])->name('payment_method');
Route::get('/Shipping_Policy', [App\Http\Controllers\about_controller::class, 'Shipping_Policy'])->name('Shipping_Policy');


// favorite
Route::get('/favourite_page', [App\Http\Controllers\favorite_controller::class, 'favourite_page'])->name('favourite_page');
Route::POST('/favorite_add', [App\Http\Controllers\favorite_controller::class, 'favorite_add'])->name('favorite_add');
Route::POST('/favorite_remove', [App\Http\Controllers\favorite_controller::class, 'favorite_remove'])->name('favorite_remove');


// customer message info
Route::POST('/customer_message_info', [App\Http\Controllers\about_controller::class, 'customer_message_info'])->name('customer_message_info');

// search feilds
Route::POST('/search_form', [App\Http\Controllers\search_controller::class, 'search_form'])->name('search_form');

// user registration
Route::get('/my_account', [App\Http\Controllers\custcontroller::class, 'my_account'])->name('my_account');
Route::POST('/update_cust_details', [App\Http\Controllers\custcontroller::class, 'update_cust_details'])->name('update_cust_details');


// customer comment
Route::POST('/customer_item_comment', [App\Http\Controllers\custcontroller::class, 'customer_item_comment'])->name('customer_item_comment');



});
