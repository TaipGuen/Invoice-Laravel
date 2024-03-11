<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/test/{name}',[InvoiceController::class,'test']); //Just for fun

Route::get('/logs',[LogController::class,'index']); //working

Route::get('/json/user',[UserController::class,'index']); //working
Route::get('/json/user/{userID}',[UserController::class,'show']); //working
Route::delete('/delete/user/{id}',[UserController::class,'destroy']); //working
Route::post('/import/user',[UserController::class,'import']); //working

Route::get('/json/product',[ProductController::class,'index']); //working
Route::get('/json/product/{id}',[ProductController::class,'show']); //working
Route::delete('/delete/product/{id}',[ProductController::class,'destroy']); //working
Route::post('/import/product',[ProductController::class,'import']); //working

Route::get('/json/invoice',[InvoiceController::class,'index']); //working
Route::get('/json/invoice/{id}',[InvoiceController::class,'show']); //working
Route::delete('/delete/invoice/{id}',[InvoiceController::class,'destroy']); //working
Route::post('/upload/invoice',[FileController::class,'upload']); //working
Route::get('/import/invoice',[InvoiceController::class,'import']); // (not) working bcs of the schedule
