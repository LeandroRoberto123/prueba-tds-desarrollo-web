<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CalendarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// CAPACITACIONES
Route::get('/create-training' , [TrainingController::class, 'create'])->name('training.create');
Route::post('/training/store' , [TrainingController::class, 'store'])->name('training.store');
Route::get('/training/edit/{id}' , [TrainingController::class, 'edit'])->name('training.edit');
Route::post('/training/update', [TrainingController::class, 'update'])->name('training.update');
Route::get('/training/delete/{id}' , [TrainingController::class, 'delete'])->name('training.delete');

// Route::get('/calendario', [CalendarioController::class, 'mostrarCalendario'])->name('calendario');


Route::get('/create-reservation' , [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservation/store' , [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/reservation/edit/{id}' , [ReservationController::class, 'edit'])->name('reservation.edit');
Route::post('/reservation/update', [ReservationController::class, 'update'])->name('reservation.update');



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
