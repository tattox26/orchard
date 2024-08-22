<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/menus', [App\Http\Controllers\MenuController::class, 'index'])->name('menus');
Route::get('/editMenu', [App\Http\Controllers\MenuController::class, 'edit'])->name('editMenu');
Route::post('/update-menu-order', [App\Http\Controllers\MenuController::class, 'updateOrder'])->name('menu.updateOrder');
Route::resource('products', App\Http\Controllers\ProductController::class);
Route::get('/block', [App\Http\Controllers\ProductController::class, 'block'])->name('block');
Route::post('/storePlugin', [App\Http\Controllers\PluginController::class, 'save'])->name('storePlugin');
Route::get('/settings', [App\Http\Controllers\PluginController::class, 'index'])->name('settings');
Route::post('/settings.store', [App\Http\Controllers\PluginController::class, 'store'])->name('settings.store');
