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
      Route::get('user', [AuthController::class,'user']);

      //billing details crud
      Route::get('bill/show/{id}', [billing_detail::class, 'showbill']);
      Route::get('bill/showall/{userid}', [billing_detail::class, 'showallbill']);
      Route::post('bill/create', [billing_detail::class, 'createbill']);
      Route::post('bill/edit',[billing_detail::class, 'editbill']);
      Route::get('bill/delete/{id}',[billing_detail::class, 'deletebill']);



   

   
     
  });
 //dashboard
  Route::get('dashboard/upcoming/{userid}',[pending_bills::class, 'show_upcoming_bill']);
  Route::get('bill/category',[billing_detail::class, 'category']);