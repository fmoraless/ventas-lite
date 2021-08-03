<?php

use App\Http\Livewire\CoinsComponent;
use App\Http\Livewire\ProductsComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Categories;

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

Route::get('categories', Categories::class);
Route::get('products', ProductsComponent::class);
Route::get('coins', CoinsComponent::class);
