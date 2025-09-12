<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\staffController;
use App\Http\Middleware\autherizeMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\User;

/////////
//user
Route::get('/', function (Request $request) {
    return view('index_user' ,[ 'products' => Product::all() , 'user'=>null ]);
});

Route::get('/login', function () {
    return view('login',['user'=>null ]);
})->name('user.login');


Route::get('/signup', function () {
    return view('signup' ,['user'=>null]);
})->name('user.signup');

Route::post('/cookie' , [CookieController::class,'setCookie'])->name('cookie.register');

Route::get("/logout" , [CookieController::class , "removeCookie"])->name('user.logout');

Route::get('/{id}', function(Request $request , $id) {
    $user = User::find($id);
    return view('index_user' ,[ 'products' => Product::all() , 'user'=>$user ]);
} )->middleware(autherizeMiddleware::class);


Route::delete('/users/{id}/cart/{cartId}', [CartController::class,'deleteFromCart'])->name('users.deleteFromCart')->middleware(autherizeMiddleware::class);






//////////////////
/////users routes
Route::controller(UserController::class)->group(function () {
    Route::get('/users/{id}','getUser')->name('users.getUser')->middleware(autherizeMiddleware::class);

    Route::delete('/users/{id}', 'distroy')->name("user.distroy")->middleware(autherizeMiddleware::class);

    Route::get("/users/{id}/orders", 'getOrders')->name('users.getOrders')->middleware(autherizeMiddleware::class);

    Route::get("/users/{id}/orders/{orderId}", 'getOrder')->name('users.getSpecificOrder')->middleware(autherizeMiddleware::class);

    Route::get('/users/{id}/cart', 'getCart')->name('users.getCart')->middleware(autherizeMiddleware::class);

    Route::post('/users/{id}/cart', 'addToCart')->name('users.addToCart')->middleware(autherizeMiddleware::class);

    Route::post('/users/{id}/orders', 'placeOrder')->name('users.placeOrder')->middleware(autherizeMiddleware::class);
});





/////////////////
/// staff
Route::controller(staffController::class)->group(function () {
    Route::get('/staff/{id}','getProducts')->name('staff.index')->middleware(autherizeMiddleware::class);

    Route::get('/staff/{id}/orders', 'getOrders')->name('staff.getOrders')->middleware(autherizeMiddleware::class);
    
    Route::get('/staff/{id}/orders/{orderId}', 'getOrder')->name('getStaffOrder')->middleware(autherizeMiddleware::class);
    
    Route::get('/staff/{id}/transports','getTransports')->name('staff.getTransports')->middleware(autherizeMiddleware::class);

    Route::get('/staff/{id}/transports/{orderId}','getTransport')->name('staff.getTransport')->middleware(autherizeMiddleware::class);
    
    Route::get('/staff/{id}/invoices', 'index')->name('staff.getInvoice')->middleware(autherizeMiddleware::class);
    
    Route::get('/staff/{id}/invoices/{invoiceId}', 'index')->name('staff.getSpecificInvoice')->middleware(autherizeMiddleware::class);
    
    Route::get('/staff/{id}/users','getUsers')->name('staff.getUsers')->middleware(autherizeMiddleware::class);

    Route::get('/staff/{id}/users/create','createUser')->name('staff.createNewUser')->middleware(autherizeMiddleware::class);
    
    Route::get('/staff/{id}/products','getProducts')->name('staff.getProducts')->middleware(autherizeMiddleware::class);

    Route::get('/staff/{id}/products/create','createProduct')->name('staff.createProducts')->middleware(autherizeMiddleware::class);
    
    Route::post('/staff/{id}/products/create','createProductCreator')->name('staff.createProductCreator')->middleware(autherizeMiddleware::class);
    
    Route::get('/staff/{id}/products/{productId}', 'getProduct')->name('staff.getProduct')->middleware(autherizeMiddleware::class);
});


/// error 404 routes
Route::get('/*' , function(){return "Route Not Defined";});
Route::post('/*' , function(){return "Route Not Defined";});
Route::patch('/*' , function(){return "Route Not Defined";});
Route::delete('/*' , function(){return "Route Not Defined";});





