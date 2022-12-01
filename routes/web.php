<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PriceController;

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


Route::get("/",[PriceController::class,'index'])->name('pricelist');
Route::get("pricecreate",[PriceController::class,'create'])->name('pricecreate');
Route::post("pricestore",[PriceController::class,'store'])->name('pricestore');
Route::get("priceedit/{id}",[PriceController::class,'edit'])->name('priceedit');
Route::post("priceupdate/{id}",[PriceController::class,'update'])->name('priceupdate');
Route::get("pricedelete/{id}",[PriceController::class,'destroy'])->name('pricedelete');

