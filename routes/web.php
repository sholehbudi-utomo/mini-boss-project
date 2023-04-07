<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CategoriController;

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

// // Route::get('/', function () {
// //     return view('proses.categori.index');
// });
Route::get('/register', [AutController::class, "register"])->name('register');
Route::get('/', [AutController::class, "login"])->name('login');


Route::post('/register', [AutController::class, "doRegister"])->name('do.register');
Route::post('/login', [AutController::class, "doLogin"])->name('do.login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [AutController::class, "logout"])->name('logout');

    // Categori
    Route::get('/categori', [CategoriController::class,'index']);
    Route::post ('/add/categori',[CategoriController::class,'store'])->name('add');
    Route::get ('/view/categori/{id}',[CategoriController::class,'edit']);
    Route::put ('/update/categori/{id}', [CategoriController::class, 'update'])->name('edit');
    Route::get ('/delete/{id}',[CategoriController::class,'destroy'])->name('hapus');

    // produk
     Route::get('/listproduk', [ProdukController::class,'index']);
     Route::get('/produk', [ProdukController::class,'show']);
     Route::post ('/add/produk',[ProdukController::class,'store'])->name('add');
     Route::get ('/view/produk/{id}',[ProdukController::class,'edit']);
     Route::put ('/update/produk/{id}', [ProdukController::class, 'update'])->name('edit');
     Route::get ('/delete/{id}',[ProdukController::class,'destroy'])->name('hapus');
    
});

