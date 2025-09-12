<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\authController;
use App\Http\Controllers\staffController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource("users", UserController::class);


Route::post("/login" , [authController::class,"login"])->name("user.login");

Route::post("/signup" , [authController::class,"signup"])->name("user.signup");

Route::patch('/users/{id}', [UserController::class,'update' ]);

Route::delete('/users/{id}', [UserController::class,'distroy' ]);

// http://127.0.0.1:8000/api/orders/1
Route::patch('/orders/{id}', [OrderController::class,'update'])->name('api.updateOrder');
// Route::patch('/orders/{id}', function(){
//     // dd(request());
// })->name('api.updateOrder');


Route::get('/check/{id}' , [authController::class,'encryption'])->name('check.encryption');



// Route::resource("/staff/{id}" , staffController::class);
