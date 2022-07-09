<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [FrontendController::class, 'index'])->name('frontend');
Route::get('/pizza/{id}', [FrontendController::class, 'show'])->name('pizza.show');
Route::post('/pizza/store', [FrontendController::class, 'store'])->name('order.store');





Route::group(['prefix' => 'admin','middleware' => ['Admin','auth']],function (){
    Route::get('',[PizzaController::class,'index'])->name('pizzas.index');
    Route::get('/create',[PizzaController::class,'create'])->name('pizzas.create');
    Route::post('/store',[PizzaController::class,'store'])->name('pizzas.store');
    Route::get('/delete/{id}',[PizzaController::class,'destroy'])->name('pizzas.delete');
    Route::get('/edit/{id}',[PizzaController::class,'edit'])->name('pizzas.edit');
    Route::post('/update/{id}',[PizzaController::class,'update'])->name('pizzas.update');
    Route::get('/user/order',[UserOrderController::class,'index'])->name('user.order');
    Route::post('/user/status/{id}',[UserOrderController::class,'changeStatus'])->name('user.status');

});





