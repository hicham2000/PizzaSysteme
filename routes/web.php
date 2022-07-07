<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pizzaa',[PizzaController::class,'index'])->name('pizza.index');
Route::get('/pizza/create',[PizzaController::class,'create'])->name('pizza.create');
Route::post('/pizza/store',[PizzaController::class,'store'])->name('pizza.store');
Route::get('/pizza/delete/{id}',[PizzaController::class,'destroy'])->name('pizza.delete');
Route::get('/pizza/edit/{id}',[PizzaController::class,'edit'])->name('pizza.edit');
Route::post('/pizza/update/{id}',[PizzaController::class,'update'])->name('pizza.update');



