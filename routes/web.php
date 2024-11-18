<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\jokiController;
use App\Models\Order;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
Route::middleware('check:admin,oyeh')->group(function() {
    Route::get('/uhuy', function () {
        return view('welcome');
    })->name("uhuy");

});

// Gabisa langsung akses kalo blom login, pake middleware('auth')
Route::middleware('role:KASIR')->group(function(){
    // Route utama, halaman utama joki
    Route::get('/joki', function(){
        return view('showjoki', ['pelanggan'=>Pelanggan::all(), 'orders'=>Order::all()]);
    })->name('joki');

});

Route::get('/request/to/api', [LoginController::class, 'request_to_api']);

Route::post('/login', [LoginController::class,'authenticate'])->name('login.post');

Route::get('/login', [LoginController::class,'index'])->name('login.index')->middleware('guest');

Route::post('/logout',[LoginController::class,'logout'])->name('logout');





// smua kebawah ini ada hubungannya ke controller, cek aja di jokiController untuk nama slain edit sama create bebas, jgn lupa ganti di
// file lain kek jokicontroller(controller),showjoki(views),edit,create(2 ini di views->pelanggan)
Route::get('/pelanggan/create',
    [jokiController::class, 'create']
)->name('pelanggan.create');

Route::post('/joki/insert',
    [jokiController::class, 'insert']
)->name('joki.insert');

// tiga route bawah ini perlu id jadi dikasi di url nya
Route::get('/pelanggan/edit/{id}',
    [jokiController::class, 'edit']
)->name('pelanggan.edit');

Route::put('/joki/update/{id}',
    [jokiController::class, 'update']
)->name('joki.update');

Route::delete('/joki/delete/{id}',
    [jokiController::class, 'delete']
)->name('joki.delete');

