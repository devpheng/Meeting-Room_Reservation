<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\RoomController as AdminRoomController;
use App\Http\Controllers\Admin\DepartmentController as AdminDepartmentController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\DriverController as AdminDriverController;

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
Route::group(['prefix'=>'admin','as'=>'admin.'], function () {
    Route::resource('/department', AdminDepartmentController::class);
    Route::group(['prefix'=>'room','as'=>'room.'], function(){
        Route::get('/', [AdminRoomController::class, 'index'])->name('index');
        Route::post('/update', [AdminRoomController::class, 'update'])->name('update');
    });
    Route::group(['prefix'=>'booking','as'=>'booking.'], function(){
        Route::get('/', [AdminBookingController::class, 'index'])->name('index');
        Route::delete('/delete', [AdminBookingController::class, 'delete'])->name('delete'); 
    });

    Route::group(['prefix'=>'car','as'=>'car.'], function(){
        Route::get('/', [AdminCarController::class, 'index'])->name('index');
        Route::get('/create', [AdminCarController::class, 'create'])->name('create');
        Route::post('/store', [AdminCarController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AdminCarController::class, 'edit'])->name('edit');
        Route::post('/update', [AdminCarController::class, 'update'])->name('update');
    });

    Route::group(['prefix'=>'driver','as'=>'driver.'], function(){
        Route::get('/', [AdminDriverController::class, 'index'])->name('index');
        Route::get('/create', [AdminDriverController::class, 'create'])->name('create');
        Route::post('/store', [AdminDriverController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminDriverController::class, 'edit'])->name('edit');
        Route::post('/update', [AdminDriverController::class, 'update'])->name('update');
    });
});

