<?php

use App\Http\Controllers\StaffAdmin\OwnersController;
use App\Http\Controllers\StaffAdmin\PropertyController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', function () {
    return redirect()->route('dashboard');
})->middleware(['auth']);

// Staff Admin
Route::middleware(['auth'])->group(function () {
    Route::resource('owners', OwnersController::class);
    Route::resource('property', PropertyController::class);
});

Route::get('/profile', function () {
    // return view('profile');
    return redirect()->route('dashboard');
})->middleware(['auth'])->name('profile');


require __DIR__ . '/auth.php';