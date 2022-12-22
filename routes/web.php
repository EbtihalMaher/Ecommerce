<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\WebsiteController;

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


Route::get('/dashboard/index' , function () {
    return view('dashboard.index');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group( function(){

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'] );

    //stores Routes
    Route::get('/', [App\Http\Controllers\Admin\StoreController::class, 'index'] );
    Route::get('store/create', [App\Http\Controllers\Admin\StoreController::class, 'create'] );
    Route::post('store', [App\Http\Controllers\Admin\StoreController::class, 'store'] );
    Route::get('store/edit/{id}', [App\Http\Controllers\Admin\StoreController::class, 'edit'] );
    Route::post('update/{id}', [App\Http\Controllers\Admin\StoreController::class, 'update'] );
    Route::get('store/delete/{id}', [App\Http\Controllers\Admin\StoreController::class, 'destroy'] );

    //products Routes
    Route::get('/product', [App\Http\Controllers\Admin\ProductController::class, 'index'] );
    Route::get('product/create', [App\Http\Controllers\Admin\ProductController::class, 'create'] );
    Route::post('product/store', [App\Http\Controllers\Admin\ProductController::class, 'store'] );
    Route::get('product/edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit'] );
    Route::post('product/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'] );
    Route::get('product/delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'] );

    // view purchasese
    Route::get('purchase/index', [App\Http\Controllers\Admin\PurchaseTransactionController::class, 'index']);
    Route::get('report/{id}', [App\Http\Controllers\Admin\PurchaseTransactionController::class, 'report']);
    Route::get('getReport/{id}', [App\Http\Controllers\Admin\PurchaseTransactionController::class, 'getReport']);
    
});


Route::get('/', 'App\Http\Controllers\Website\WebsiteController@index');
Route::get('store','App\Http\Controllers\Website\WebsiteController@store');
Route::get('viewStore/{name}','App\Http\Controllers\Website\WebsiteController@viewStore');
Route::get('store/{storeId}/{id}','App\Http\Controllers\Website\WebsiteController@productview');
Route::post('search', 'App\Http\Controllers\Website\WebsiteController@search');
Route::post('transaction/{id}/{price}', 'App\Http\Controllers\Website\WebsiteController@addPurchaseTransaction');
