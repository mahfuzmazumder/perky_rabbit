<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Product\ProductUnitController;
use App\Http\Controllers\Admin\Product\ProductInventoryController;
use App\Http\Controllers\Admin\Product\ProductTypeController;
use App\Http\Controllers\Admin\Product\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes(['reset' => false]);

Route::get('/', function () {
    return redirect()->route('login');
});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')/*->middleware(['auth'])*/->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin_dashboard');

    /*
    |--------------------------------------------------------------------------
    | Product Unit CRUD
    |--------------------------------------------------------------------------
    */
    Route::get('/product/unit/manage', [ProductUnitController::class, 'index'])->name('product_units_manage');
    Route::get('/product/unit/create', [ProductUnitController::class, 'create'])->name('product_unit_create');
    Route::post('/product/unit/create', [ProductUnitController::class, 'store'])->name('product_unit_create');
    Route::get('/product/unit/edit/{product_unit}', [ProductUnitController::class, 'edit'])->name('product_unit_edit');
    Route::put('/product/unit/edit/{product_unit}', [ProductUnitController::class, 'update'])->name('product_unit_edit');
    Route::get('/product/unit/edit/{product_unit}', [ProductUnitController::class, 'delete'])->name('product_unit_delete');

    /*
    |--------------------------------------------------------------------------
    | Product Type CRUD
    |--------------------------------------------------------------------------
    */
    Route::get('/product/type/manage', [ProductTypeController::class, 'index'])->name('product_type_manage');
    Route::get('/product/type/create', [ProductTypeController::class, 'create'])->name('product_type_create');
    Route::post('/product/type/create', [ProductTypeController::class, 'store'])->name('product_type_create');
    Route::get('/product/type/edit/{product_type}', [ProductTypeController::class, 'edit'])->name('product_type_edit');
    Route::put('/product/type/edit/{product_type}', [ProductTypeController::class, 'update'])->name('product_type_edit');
    Route::get('/product/type/edit/{product_type}', [ProductTypeController::class, 'update'])->name('product_type_delete');

    /*
    |--------------------------------------------------------------------------
    | Product CRUD
    |--------------------------------------------------------------------------
    */
    Route::get('/product/manage', [ProductController::class, 'index'])->name('product_manage');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product_create');
    Route::post('/product/create', [ProductController::class, 'store'])->name('product_create');
    Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product_edit');
    Route::put('/product/edit/{product}', [ProductController::class, 'update'])->name('product_edit');
    Route::get('/product/edit/{product}', [ProductController::class, 'update'])->name('product_delete');

    /*
    |--------------------------------------------------------------------------
    | Product Inventory CRUD
    |--------------------------------------------------------------------------
    */
    Route::get('/product/inventory/create', [ProductInventoryController::class, 'create'])->name('product_inventory_create');


    /*
    |--------------------------------------------------------------------------
    | Common AJAX
    |--------------------------------------------------------------------------
    */
    Route::get('/product/info', [ProductController::class, 'get_product_info'])->name('get_product_info');
});




Route::get('/cache-clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});
