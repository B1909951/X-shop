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
//frontend
Route::get('/', 'HomeController@index');
Route::get('/trang-chu', 'HomeController@index');
Route::get('/danh-muc-san-pham/{category_id}', 'CategoryProduct@show_category_home');
Route::get('/thuong-hieu-san-pham/{brand_id}', 'BrandProduct@show_brand_home');
Route::get('/chi-tiet-san-pham/{brand_id}', 'ProductController@product_details');
Route::post('/tim-kiem', 'HomeController@tim_kiem');
Route::get('/all-product-home', 'HomeController@all_product_home');




//backend
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'CheckoutController@manage_order');
Route::get('/logout', 'AdminController@logout');
Route::post('/admin-dashboard', 'AdminController@dashboard');

//category product
Route::get('/add-category-product', 'CategoryProduct@add_category_product');
Route::get('/all-category-product', 'CategoryProduct@all_category_product');

Route::get('/edit-category-product/{category_product_id}', 'CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}', 'CategoryProduct@delete_category_product');

Route::post('/save-category-product', 'CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}', 'CategoryProduct@update_category_product');

Route::get('/show-category-product/{category_product_id}', 'CategoryProduct@show_category_product');
Route::get('/hidden-category-product/{category_product_id}', 'CategoryProduct@hidden_category_product');

//Brand product
Route::get('/add-brand-product', 'BrandProduct@add_brand_product');
Route::get('/all-brand-product', 'BrandProduct@all_brand_product');

Route::get('/edit-brand-product/{brand_product_id}', 'BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}', 'BrandProduct@delete_brand_product');

Route::post('/save-brand-product', 'BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}', 'BrandProduct@update_brand_product');

Route::get('/show-brand-product/{brand_product_id}', 'BrandProduct@show_brand_product');
Route::get('/hidden-brand-product/{brand_product_id}', 'BrandProduct@hidden_brand_product');

//Product
Route::get('/add-product', 'ProductController@add_product');
Route::get('/all-product', 'ProductController@all_product');

Route::post('/save-product', 'ProductController@save_product');
Route::post('/update-product/{product_id}', 'ProductController@update_product');

Route::get('/edit-product/{product_id}', 'ProductController@edit_product');
Route::get('/delete-product/{product_id}', 'ProductController@delete_product');

Route::get('/show-product/{product_id}', 'ProductController@show_product');
Route::get('/hidden-product/{product_id}', 'ProductController@hidden_product');

//cart
Route::post('/save-cart', 'CartController@save_cart');
Route::get('/show-cart', 'CartController@show_cart');
Route::get('/delete-cart/{row_id}', 'CartController@delete_cart');
Route::post('/update-cart-qty', 'CartController@update_cart_qty');

//checkout
Route::get('/login-checkout', 'CheckoutController@login_checkout');
Route::get('/signup-checkout', 'CheckoutController@signup_checkout');

Route::get('/logout-checkout', 'CheckoutController@logout_checkout');
Route::post('/add-customer', 'CheckoutController@add_customer');
Route::get('/show-checkout/{customerId}', 'CheckoutController@show_checkout');
Route::post('/save-checkout-customer', 'CheckoutController@save_checkout_customer');
Route::post('/login-customer', 'CheckoutController@login_customer');
Route::get('/payment', 'CheckoutController@payment');
Route::post('/order-place', 'CheckoutController@order_place');




//order
Route::get('/manage-order', 'CheckoutController@manage_order');
Route::get('/view-order/{order_id}', 'CheckoutController@view_order');
Route::get('/show-history/{customerId}', 'CheckoutController@show_history');
Route::get('/view-history-order/{order_id}', 'CheckoutController@show_history_order');
Route::get('/comfim-order/{order_id}', 'CheckoutController@comfim_order');
Route::get('/cancel-order/{order_id}', 'CheckoutController@cancel_order');
Route::get('/delete-order/{order_id}', 'CheckoutController@delete_order');










