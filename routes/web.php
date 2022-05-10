<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\SellerController;
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


// home page ----------------------------------------------------
Route::get('/', [CarController::class, 'index'])->name('home');

// get started page --------------------------------------------
Route::get('/get-started', function () {
    return view('get_started');
})->name('get_started');

// car details page ----------------------------------------------
Route::get('/car-info/{id}', [CarController::class, 'read'])->name('car');


//----------------------------------- Admin Routes -------------------------------------

// render admin login page view
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login')->middleware('guest');

// submit admin login form
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.submit.login')->middleware('guest');

Route::controller(AdminController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    // render admin register page view
    Route::get('/register', function () {
        return view('admin.admins.create');
    })->name('register');

    // submit admin register form
    Route::post('/register', 'store')->name('submit.register');

    Route::get('/show', function () {
        return view('admin.admins.show');
    })->name('show');
    Route::get('/read', 'read')->name('read');

    Route::post('/update', 'update')->name('update');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/delete/{id}', 'delete')->name('delete');
});

Route::get('/admin/seller/{id}/cars', [SellerController::class, 'getOwnedCars'])->middleware('auth')->name('admin.seller.cars');

Route::get('/admin/car-info/{id}', [CarController::class, 'readCarForAdmin'])->middleware('auth')->name('admin.car.info');

Route::get('/admin/car/{id}/delete', [CarController::class, 'adminDeleteCar'])->middleware('auth')->name('admin.car.delete');


// --------------------------- End of Admin Routes -----------------------------------------



// --------------------------- Seller Routes -----------------------------------------------

// render seller login page view
Route::get('/seller/login', function () {
    return view('seller.login');
})->name('seller.login')->middleware('guest:seller');

// submit seller login form
Route::post('/seller/login', [SellerController::class, 'login'])->name('seller.submit.login')->middleware('guest:seller');

// render seller register page view
Route::get('/seller/register', function () {
    return view('seller.register');
})->name('seller.register');

// submit seller register form
Route::post('/seller/register', [SellerController::class, 'store'])->name('seller.submit.register');

Route::controller(SellerController::class)->prefix('seller')->name('seller.')->middleware('seller')->group(function () {

    Route::get('/dashboard', function () {
        return view('seller.index');
    })->name('dashboard');

    Route::get('/cars', function () {
        return view('seller.my_cars');
    })->name('cars');

    Route::post('/update', 'update')->name('update');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/delete', 'delete')->name('delete');
});

Route::get('/seller/show', function () {
    return view('admin.sellers.show');
})->name('seller.show')->middleware('auth');

Route::get('/seller/read', [SellerController::class, 'read'])->name('seller.read')->middleware('auth');


// ------------------------------ End of Seller Routes ----------------------------------



// ---------------------------------- Car Routes ----------------------------------------

Route::controller(CarController::class)->prefix('car')->name('car.')->middleware('seller')->group(function () {

    Route::get('/sell', function () {
        return view('seller.car_sell');
    })->name('sell');

    Route::post('/store', 'store')->name('store');
    Route::get('/{id}/update', 'updateView')->name('update');
    Route::post('/{id}/update', 'updateSubmit')->name('submit.update');
    Route::get('/{id}/delete', [CarController::class, 'delete'])->name('delete');
});

Route::get('/car/{id}/approve', [CarController::class, 'approve'])->middleware('auth')->name('car.approve');

Route::get('/car/waiting', [CarController::class, 'waiting'])->middleware('auth')->name('car.waiting');
Route::get('/car/approved', [CarController::class, 'approved'])->middleware('auth')->name('car.approved');

// ------------------------------ End of Car Routes ----------------------------------------
