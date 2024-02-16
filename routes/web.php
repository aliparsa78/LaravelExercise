<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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
    Route::get('category',[DashboardController::class,'category'])->name('category');
    Route::post('/addCategory',[DashboardController::class,'addCategory'])->name('addCategory');
    Route::get('/category/edit/{id}',[DashboardController::class,'editCategory']);
    Route::post('/category/update/{id}',[DashboardController::class,'categoryUpdate']);
    Route::get('/category/softDelete/{id}',[DashboardController::class,'sofrDelete']);
    Route::get('/category/restore/{id}',[DashboardController::class,'RestoreCategory']);
    Route::get('/category/pdelete/{id}',[DashboardController::class,'PdeleteCategory']);
    Route::get('/home',function(){
        return view('Home');
    })->name('home');
});