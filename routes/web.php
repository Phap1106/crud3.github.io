<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManufactureController;
use App\Http\Middleware\CheckLoginMiddleware;
use App\Http\Middleware\CheckSuperAdminMiddleware;

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
    return view('welcome');
});



    Route::get('addnew',[App\Http\Controllers\ProductController::class,'addNew'])->name('addnew');
    Route::post('addnewpost',[App\Http\Controllers\ProductController::class,'addNewPost'])->name('addnewpost');
    Route::resources
    ([
        'products'=>App\Http\Controllers\ProductController::class,
        'manuafactures'=>App\Http\Controllers\ManufactureController::class,
    ]);
    Route::resources
    ([
        'manuafactures'=>App\Http\Controllers\ManufactureController::class,
    ]);

    Route::get('products.api',[ProductController::class , 'api'] ) ->name('products.api');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
