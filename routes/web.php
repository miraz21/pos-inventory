<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriesController;

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
    return view('layouts.main');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/categories',[App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');

Route::get('/categories/create',[App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');

Route::post('/categories/create',[App\Http\Controllers\CategoryController::class, 'store']);

Route::get('/categories/delete/{id}',[App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');



Route::get('/products',[App\Http\Controllers\ProductController::class,'index'])->name('product.index');

Route::get('/products/create',[App\Http\Controllers\ProductController::class,'create'])->name('product.create');

Route::post('/products/create',[App\Http\Controllers\ProductController::class,'store']);

Route::get('/products/edit/{id}',[App\Http\Controllers\ProductController::class,'edit'])->name('product.edit');

Route::post('/products/edit/{id}',[App\Http\Controllers\ProductController::class,'update']);

Route::get('/products/delete/{id}',[App\Http\Controllers\ProductController::class,'delete'])->name('product.delete');

//Route::get('/search',[App\Http\Controllers\SearchController::class, 'search'])->name('web.search');

//Route::get('/find',[App\Http\Controllers\SearchController::class, 'find'])->name('web.find');



Route::get('/marketings',[App\Http\Controllers\MarketingController::class, 'index'])->name('marketing.index');

Route::get('/marketings/create',[App\Http\Controllers\MarketingController::class, 'create'])->name('marketing.create');

Route::post('/marketings/create',[App\Http\Controllers\MarketingController::class, 'store']);

Route::get('/marketings/delete/{id}',[App\Http\Controllers\MarketingController::class, 'delete'])->name('marketing.delete');



Route::get('/dailycosts',[App\Http\Controllers\DailyCostController::class,'index'])->name('dailycost.index');

Route::get('/dailycosts/create',[App\Http\Controllers\DailyCostController::class,'create'])->name('dailycost.create');

Route::post('/dailycosts/create',[App\Http\Controllers\DailyCostController::class,'store']);

Route::get('/dailycosts/edit/{id}',[App\Http\Controllers\DailyCostController::class,'edit'])->name('dailycost.edit');

Route::post('/dailycosts/edit/{id}',[App\Http\Controllers\DailyCostController::class,'update']);

Route::get('/dailycosts/delete/{id}',[App\Http\Controllers\DailyCostController::class,'delete'])->name('dailycost.delete');


Route::get('/salemans',[App\Http\Controllers\SaleManController::class, 'index'])->name('saleman.index');

Route::get('/salemans/create',[App\Http\Controllers\SaleManController::class, 'create'])->name('saleman.create');

Route::post('/salemans/create',[App\Http\Controllers\SaleManController::class, 'store']);

Route::get('/salemans/delete/{id}',[App\Http\Controllers\SaleManController::class, 'delete'])->name('saleman.delete');



Route::get('/dailysales',[App\Http\Controllers\DailySaleController::class,'index'])->name('dailysale.index');

Route::get('/dailysales/create',[App\Http\Controllers\DailySaleController::class,'create'])->name('dailysale.create');

Route::post('/dailysales/create',[App\Http\Controllers\DailySaleController::class,'store']);

Route::get('/dailysales/edit/{id}',[App\Http\Controllers\DailySaleController::class,'edit'])->name('dailysale.edit');

Route::post('/dailysales/edit/{id}',[App\Http\Controllers\DailySaleController::class,'update']);

Route::get('/dailysales/delete/{id}',[App\Http\Controllers\DailySaleController::class,'delete'])->name('dailysale.delete');


Route::get('/brandnames',[App\Http\Controllers\BrandNameController::class, 'index'])->name('brandname.index');

Route::get('/brandnames/create',[App\Http\Controllers\BrandNameController::class, 'create'])->name('brandname.create');

Route::post('/brandnames/create',[App\Http\Controllers\BrandNameController::class, 'store']);

Route::get('/brandnames/delete/{id}',[App\Http\Controllers\BrandNameController::class, 'delete'])->name('brandname.delete');



Route::get('/productcategories',[App\Http\Controllers\ProductCategoryController::class, 'index'])->name('productcategory.index');

Route::get('/productcategories/create',[App\Http\Controllers\ProductCategoryController::class, 'create'])->name('productcategory.create');

Route::post('/productcategories/create',[App\Http\Controllers\ProductCategoryController::class, 'store']);

Route::get('/productcategories/delete/{id}',[App\Http\Controllers\ProductCategoryController::class, 'delete'])->name('productcategory.delete');



Route::get('/productnames',[App\Http\Controllers\ProductNameController::class, 'index'])->name('productname.index');

Route::get('/productnames/create',[App\Http\Controllers\ProductNameController::class, 'create'])->name('productname.create');

Route::post('/productnames/create',[App\Http\Controllers\ProductNameController::class, 'store']);

Route::get('/productnames/delete/{id}',[App\Http\Controllers\ProductNameController::class, 'delete'])->name('productname.delete');



Route::get('/companynames',[App\Http\Controllers\CompanyNameController::class, 'index'])->name('companyname.index');

Route::get('/companynames/create',[App\Http\Controllers\CompanyNameController::class, 'create'])->name('companyname.create');

Route::post('/companynames/create',[App\Http\Controllers\CompanyNameController::class, 'store']);

Route::get('/companynames/delete/{id}',[App\Http\Controllers\CompanyNameController::class, 'delete'])->name('companyname.delete');



Route::get('/returnproducts',[App\Http\Controllers\ReturnProductController::class, 'index'])->name('returnproduct.index');

Route::get('/returnproducts/create',[App\Http\Controllers\ReturnProductController::class, 'create'])->name('returnproduct.create');

Route::post('/returnproducts/create',[App\Http\Controllers\ReturnProductController::class, 'store']);

Route::get('/returnproducts/delete/{id}',[App\Http\Controllers\ReturnProductController::class, 'delete'])->name('returnproduct.delete');