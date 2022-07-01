<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'bookings','as'=>'booking.'], function(){
    Route::get('/search', [BookingController::class, 'search'])->name('search');
    Route::get('/list', [BookingController::class, 'list'])->name('list');
    Route::post('/store', [BookingController::class, 'store'])->name('store');
});


Route::prefix('admin')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('/department', App\Http\Controllers\Admin\DepartmentController::class);
});

