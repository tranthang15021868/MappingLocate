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

Route::get('testt', 'Api\TestController@he');

Route::group(['namespace' => 'Api'], function () {
    Route::resource('test', 'TestController');
});

Route::post('auth/register', 'DeviceController@register');

Route::post('auth/login', 'DeviceController@login');

Route::group(['middleware' => 'jwt.auth'], function () {

    Route::post('user', 'DeviceController@getAuthUser');

    Route::get('getAllCate', 'Api\CategoriesController@index');

    Route::get('getUtiilities/{lat}/{long}', 'Api\UtilitiesController@getUtiilities');

    Route::get('searchUtilitiesWithLocation/{lat}/{long}/{cate}', 'Api\UtilitiesController@searchUtilitiesWithLocation');
    
    Route::get('searchUtilitiesInCity/{city}/{cate}/{lang}/{lat}/{long}/{device_code}', 'Api\UtilitiesController@searchUtilitiesInCity');

    // Get detail of Vending Machine
    Route::get('getDetailVendingMachine/{id}', 'Api\VendingMachineController@getDetailVendingMachine');

    // Get detail of Post Box
    Route::get('getDetailPostBox/{id}', 'Api\PostBoxesController@getDetailPostBox');

    // Get detail of Cafe Shop
    Route::get('getDetailCafeShop/{id}', 'Api\CafeShopsController@getDetailCafeShop');

    // Get detail of Convenince Store
    Route::get('getDetailConvenienceStore/{id}', 'Api\ConvenienceStoresController@getDetailConvenienceStore');

    // Get detail of Supermaket
    Route::get('getDetailSupermarket/{id}', 'Api\SupermaketController@getDetailSupermarket');

    // Create new Vending Machine
    Route::post('createNewVendingMachine', 'Api\VendingMachineController@createNewVendingMachine');

    // Create new Postbox
    Route::post('createNewPostbox', 'Api\PostBoxesController@createNewPostbox');

    // Create new Cafe Shop
    Route::post('createNewCafeShop', 'Api\CafeShopsController@createNewCafeShop');

    // Create new Convenience Store
    Route::post('createNewConveninceStore', 'Api\ConvenienceStoresController@createNewConveninceStore');

    // Create new Supermarket
    Route::post('createNewSupermarket', 'Api\SupermaketController@createNewSupermarket');

    // Edit Vending Machine
    Route::post('editVendingMachine/{id}', 'Api\VendingMachineController@editVendingMachine');

    // Edit Postbox
    Route::post('editPostbox/{id}', 'Api\PostBoxesController@editPostbox');

    // Edit Cafe Shop
    Route::post('editCafeShop/{id}', 'Api\CafeShopsController@editCafeShop');

    // Edit Convenience Store
    Route::post('editConveninceStore/{id}', 'Api\ConvenienceStoresController@editConveninceStore');

    // Edit Supermarket
    Route::post('editSupermarket/{id}', 'Api\SupermaketController@editSupermarket');

    // Delete Utility
    Route::post('deleteUtility/{id}', 'Api\UtilitiesController@deleteUtility');

    // Send mail report
    Route::post('sendMailReport/{id}', 'Api\MailController@sendMailReport');
});
