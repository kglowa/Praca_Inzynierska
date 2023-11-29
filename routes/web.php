<?php

use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;


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
Route::get('phone_book/card', [\App\Http\Controllers\PhoneBookController::class, 'index'])->name('phonebook');

Route::post('order', [\App\Http\Controllers\OrderShipmentController::class, 'store'])->name('order.store');


Route::get('users/list', [UserController::class, 'index'])->name('users');
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::get('users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
Route::post('users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('category/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
Route::post('category', [\App\Http\Controllers\CategoryController::class, 'store'])->name('category.store')->middleware('auth');
Route::delete('category/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy')->middleware('auth');

Route::get('department/create', [\App\Http\Controllers\DepartmentController::class, 'create'])->name('department.create');
Route::post('department', [\App\Http\Controllers\DepartmentController::class, 'store'])->name('department.store')->middleware('auth');
Route::delete('department/{department}', [\App\Http\Controllers\DepartmentController::class, 'destroy'])->name('department.destroy')->middleware('auth');

Route::get('position/create', [\App\Http\Controllers\PositionController::class, 'create'])->name('position.create');
Route::post('position', [\App\Http\Controllers\PositionController::class, 'store'])->name('position.store')->middleware('auth');
Route::delete('position/{department}', [\App\Http\Controllers\PositionController::class, 'destroy'])->name('position.destroy')->middleware('auth');

Route::get('/equipment', [EquipmentController::class, 'index'])->name( 'equipment.index')->middleware('auth');
Route::get('equipment/create', [EquipmentController::class, 'create'])->name('equipment.create')->middleware('auth');
Route::post('equipment', [EquipmentController::class, 'store'])->name('equipment.store')->middleware('auth');
Route::get('equipment/edit/{equipment}', [EquipmentController::class, 'edit'])->name('equipment.edit')->middleware('auth');
Route::delete('equipment/{equipment}', [EquipmentController::class, 'destroy'])->name('equipment.destroy')->middleware('auth');
Route::post('equipment/{equipment}', [EquipmentController::class, 'update'])->name('equipment.update')->middleware('auth');
Route::get('equipment/add_user/{equipment}', [EquipmentController::class, 'add_user'])->name('equipment.add_user')->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

