<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\billing_detail;
use App\Http\Controllers\pending_bills;

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




Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class,'login']);
    Route::post('signup', [AuthController::class,'signup']);

    //Route::get('/home', [HomeController::class,'index'])->name('home');
});

Route::group([
    'middleware' => 'auth:api'
  ], function() {
      Route::get('logout', [AuthController::class,'logout']);
    
  });
 //dashboard

 Route::get('dashboard/status/{id}',[pending_bills::class, 'status']);
 Route::get('dashboard/pending/{userid}',[pending_bills::class, 'show_pending_bill']);
 Route::get('dashboard/pending2/{userid}',[pending_bills::class, 'show_pending_bill2']);
  Route::get('dashboard/upcoming/{userid}',[pending_bills::class, 'show_upcoming_bill']);
  Route::get('dashboard/upcoming2/{userid}',[pending_bills::class, 'show_upcoming_bill2']);
  Route::get('bill/category',[billing_detail::class, 'category']);
  Route::get('user/{email}', [AuthController::class,'user']);
Route::get('/dashboard/allactivebills/{userid}',[pending_bills::class, 'allactivebills']);
Route::get('/dashboard/allactivebills2/{userid}',[pending_bills::class, 'allactivebills2']);
Route::get('/dashboard/categorygraph/{userid}',[pending_bills::class, 'categorygraph']);
Route::get('/subscriber/{email}',[pending_bills::class, 'subscriber']);

//billing details crud
  Route::get('bill/show/{id}', [billing_detail::class, 'showbill']);
  Route::get('bill/showall/{userid}', [billing_detail::class, 'showallbill']);
  Route::post('bill/create', [billing_detail::class, 'createbill']);
  Route::post('bill/edit',[billing_detail::class, 'editbill']);
  Route::get('bill/delete/{id}',[billing_detail::class, 'deletebill']);
  