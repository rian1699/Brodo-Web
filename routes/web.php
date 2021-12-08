<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;

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
//     return view('dashboard.index');
// });

// Route::get('/login', function () {
//     return view('login.index');
// });

Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'tittle' => 'Dashboard',
    ]);
});

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('/bahan', BahanController::class);
Route::resource('/produk', ProdukController::class);
Route::resource('/user', UserController::class);
