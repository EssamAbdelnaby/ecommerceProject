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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::post('admin/login', 'Admin\LoginController@authenticate')->name('admin.login.post');
Route::get('admin/logout', 'Admin\LoginController@logout')->name('admin.logout');

Route::group(['middleware' => 'Admin','prefix'  =>  'admin'], function () {
    Route::view('/', 'admin.dashboard.index')->name('dashboard.index');;
    Route::resource('categories', 'Admin\CategoryController');
    Route::resource('brands', 'Admin\BrandController');
    Route::resource('products', 'Admin\ProductsController');
});
Route::get('/', 'Site\SiteController@index')->name('site.home');

Route::get('/addToCart/{product}', 'Site\CartController@addToCart')->name('cart.add');
Route::get('/shopping-cart', 'Site\CartController@showCart')->name('cart.show');
Route::delete('/products/{product}', 'Site\CartController@destroy')->name('cart.remove');
Route::get('/checkout/{amount}', 'Site\CartController@checkout')->name('cart.checkout')->middleware('auth');


Route::get('/category/{slug}', 'Site\SiteController@show')->name('category.show');
Route::get('/brand/{slug}', 'Site\SiteController@show')->name('brand.show');
Route::get('/product/{slug}', 'Site\SiteController@showProduct')->name('product.show');
