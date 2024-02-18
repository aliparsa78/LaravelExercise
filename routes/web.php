<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;

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

Route::get('/',function(){
    return view('welcome');
});
Route::group(['middleware'=>['auth','userCheck']],function(){
    
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('category',[CategoryController::class,'category'])->name('category');
    Route::post('/addCategory',[CategoryController::class,'addCategory'])->name('addCategory');
    Route::get('/category/edit/{id}',[CategoryController::class,'editCategory']);
    Route::post('/category/update/{id}',[CategoryController::class,'categoryUpdate']);
    Route::get('/category/softDelete/{id}',[CategoryController::class,'sofrDelete']);
    Route::get('/category/restore/{id}',[CategoryController::class,'RestoreCategory']);
    Route::get('/category/pdelete/{id}',[CategoryController::class,'PdeleteCategory']);
    // Brand part 
    Route::get('/brand',[BrandController::class,'index'])->name('brand');
    Route::post('/addBrand',[BrandController::class,'addBrand']);
    Route::get('/brand/edit/{id}',[BrandController::class,'edite']);
    Route::post('/updateBrand/{id}',[BrandController::class,'updateBrand']);





    Route::get('/home',function(){
        return view('Home');
    })->name('home');
});