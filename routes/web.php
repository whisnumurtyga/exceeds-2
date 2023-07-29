<?php

use App\Http\Controllers\DummyTransactionController;
use App\Http\Controllers\UserController;
use App\Models\DummyTransaction;
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
    return view('landing-page');
})->name('landing-page');

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::get('/homepage', function () {
    return view('homepage');
})->name('homepage');



// Route::get('/mutation', function () {
//     return view('mutation');
// })->name('mutation');

Route::get('/mutation', [DummyTransactionController::class, 'index'])->name('mutation');

Route::get('/transfer', function () {
    return view('transfer');
})->name('transfer');

Route::get('/transfer-2', function () {
    return view('transfer-2');
})->name('transfer-2');
