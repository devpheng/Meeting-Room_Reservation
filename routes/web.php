<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;

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
    Route::group(['prefix'=>'room','as'=>'room.'], function(){
        Route::get('/', [RoomController::class, 'index'])->name('index');
        Route::get('/search', [BookingController::class, 'search'])->name('search');
        Route::post('/store', [BookingController::class, 'store'])->name('store');
        Route::delete('/delete', [BookingController::class, 'delete'])->name('delete'); 
    });
});


Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');
});
Route::prefix('admin')->group(function () {
    Route::resource('/department', App\Http\Controllers\Admin\DepartmentController::class);
});

