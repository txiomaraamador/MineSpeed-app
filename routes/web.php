<?php

use Illuminate\Support\Facades\Route;

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

//Tabla Areas
use App\Http\Controllers\AreaController;

Route::get('/areas', [AreaController::class, 'index'])->name('areas.index');
Route::get('/areas/create', [AreaController::class, 'create'])->name('areas.create');
Route::post('/areas', [AreaController::class, 'store'])->name('areas.store');
Route::get('/areas/{id}', [AreaController::class, 'show'])->name('areas.show');
Route::get('/areas/{id}/edit', [AreaController::class, 'edit'])->name('areas.edit');
Route::put('/areas/{id}', [AreaController::class, 'update'])->name('areas.update');
Route::delete('/areas/{id}', [AreaController::class, 'destroy'])->name('areas.destroy');

//Positions
use App\Http\Controllers\PositionController;

Route::get('/positions', [PositionController::class, 'index'])->name('positions.index');
Route::get('/positions/create', [PositionController::class, 'create'])->name('positions.create');
Route::post('/positions', [PositionController::class, 'store'])->name('positions.store');
Route::get('/positions/{id}', [PositionController::class, 'show'])->name('positions.show');
Route::get('/positions/{id}/edit', [PositionController::class, 'edit'])->name('positions.edit');
Route::put('/positions/{id}', [PositionController::class, 'update'])->name('positions.update');
Route::delete('/positions/{id}', [PositionController::class, 'destroy'])->name('positions.destroy');

//Tabla Typeequipments

use App\Http\Controllers\TypeEquipmentController;

Route::get('/typeequipments', [TypeEquipmentController::class, 'index'])->name('typeequipments.index');
Route::get('/typeequipments/create', [TypeEquipmentController::class, 'create'])->name('typeequipments.create');
Route::post('/typeequipments', [TypeEquipmentController::class, 'store'])->name('typeequipments.store');
Route::get('/typeequipments/{id}', [TypeEquipmentController::class, 'show'])->name('typeequipments.show');
Route::get('/typeequipments/{id}/edit', [TypeEquipmentController::class, 'edit'])->name('typeequipments.edit');
Route::put('/typeequipments/{id}', [TypeEquipmentController::class, 'update'])->name('typeequipments.update');
Route::delete('/typeequipments/{id}', [TypeEquipmentController::class, 'destroy'])->name('typeequipments.destroy');

//Tabla de TypeVehicles.
use App\Http\Controllers\TypeVehicleController;

Route::get('/typevehicles', [TypeVehicleController::class, 'index'])->name('typevehicles.index');
Route::get('/typevehicles/create', [TypeVehicleController::class, 'create'])->name('typevehicles.create');
Route::post('/typevehicles', [TypeVehicleController::class, 'store'])->name('typevehicles.store');
Route::get('/typevehicles/{id}', [TypeVehicleController::class, 'show'])->name('typevehicles.show');
Route::get('/typevehicles/{id}/edit', [TypeVehicleController::class, 'edit'])->name('typevehicles.edit');
Route::put('/typevehicles/{id}', [TypeVehicleController::class, 'update'])->name('typevehicles.update');
Route::delete('/typevehicles/{id}', [TypeVehicleController::class, 'destroy'])->name('typevehicles.destroy');
