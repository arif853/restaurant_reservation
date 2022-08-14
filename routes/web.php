<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CatagoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\ReservationController as FrontendreservationController;
use App\Http\Controllers\Frontend\WelcomeController;
use Illuminate\Support\Facades\Route;



Route::get('/', [WelcomeController::class, 'index']);
Route::get('/categories', [FrontendCategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [FrontendCategoryController::class, 'show'])->name('categories.show');
Route::get('/menus', [FrontendMenuController::class, 'index'])->name('menus.index');
Route::get('/resrvation/step-one', [FrontendReservationController::class, 'stepOne'])->name('reservation.step.one');
Route::post('/resrvation/step-one', [FrontendReservationController::class, 'storeStepOne'])->name('reservation.store.step.one');
Route::get('/resrvation/step-two', [FrontendReservationController::class, 'stepTwo'])->name('reservation.step.two');
Route::post('/resrvation/step-two', [FrontendReservationController::class, 'storeStepTwo'])->name('reservation.store.step.two');
Route::get('/thankyou', [WelcomeController::class, 'thankyou'])->name('thankyou');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route:: middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/',[AdminController::class, 'index'])->name('index');
    Route::resource('/categories', CatagoryController::class);
    Route::resource('/menus', MenuController::class);
    Route::resource('/tables', TableController::class);
    Route::resource('/reservations', ReservationController::class);
});
require __DIR__.'/auth.php';
