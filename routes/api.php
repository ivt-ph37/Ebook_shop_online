<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('fillter/products','ProductController@filterProduct');

Route::resource('categories','CategoryController');
Route::get('getcategories','CategoryController@getAllCategory');
Route::get('getsubcategories','CategoryController@getSubCategory');



Route::resource('users','UserController');
Route::resource('roles','RoleController');
Route::resource('products','ProductController');
Route::get('filter/products','ProductController@searchProductByName');
Route::resource('orders','TransactionController');
Route::get('categories/{cat}/products', 'ProductController@getProductByCategory');
Route::resource('reviews','ReviewController');
Route::Post('users/{user_id}/reviews', 'ReviewController@store');
Route::get('products/{id}/reviews','ProductController@getProductReview');





Route::resource('producers','ProducerController');
Route::resource('addresses','AddressController');
Route::get('users/{user_id}/orders', 'TransactionController@getOrderByUser');
Route::resource('orderstatuses','TransactionStatusController');

Route::resource('photoarrays','PhotoArrayController');
Route::get('products/{id}/photos','ProductController@getPhotosOfProduct');
Route::get('reports','ReportController@index');
Route::resource('productstatuses','ProductStatusController');

Route::group([
    'middleware' => ['api'],
    'prefix' => 'auth'
], function ($router) {
    // Route::post('register', 'Auth\AuthController@register');
    Route::post('register', [ 'as' => 'register', 'uses' => 'Auth\AuthController@register']);
    Route::post('login', 'Auth\AuthController@login');
    Route::post('logout', 'Auth\AuthController@logout');
    Route::post('refresh', 'Auth\AuthController@refresh');
    Route::post('me', 'Auth\AuthController@me');
    Route::post('update/{id}', 'Auth\AuthController@updateUser');

});
