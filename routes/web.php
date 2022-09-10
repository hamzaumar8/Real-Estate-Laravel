<?php

use App\Http\Controllers\StaffAdmin\OwnersController;
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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Staff Admin
Route::middleware(['auth'])->group(function () {
    Route::resource('owners', OwnersController::class);
});

require __DIR__ . '/auth.php';