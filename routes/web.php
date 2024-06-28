<?php

use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\master\MasterController;
use App\Http\Controllers\master\RoleController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

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
    return view('auth/login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['admin'])->group(function (){
    Route::get('dashboard-admin',[MenuController::class,'dashboard'])->name('dashboard.admin');
    Route::post('insert',[MenuController::class,'insert_menu']);
    Route::get('menu',[MenuController::class,'menu']);
    Route::get('tambah',[MenuController::class, 'tambah']);
    Route::get('update',[MenuController::class, 'update']);
    Route::post('update_menu',[MenuController::class, 'update_menu']);


    Route::post('/order', [OrderController::class, 'order']);
Route::post('/order/delete', [OrderController::class, 'deleteall']);
Route::post('/order/deleteone', [OrderController::class, 'deleteone']);

    // Route::post('/order', [OrderController::class, 'order']);
    // Route::post('/order/cancel', [OrderController::class, 'cancel']);
    Route::get('halaman',[OrderController::class,'men']);

    // Page Orderan
    // Route::get('orderan',function()
    // {
    //  return view('admin.halaman');
    // });

// Route::resource('transaksi', TransaksiController::class,'');



Route::get('/session/tampil',[OrderController::class,'tampilkanSession']);
Route::get('/session/buat',[OrderController::class,'buatSession']);
Route::get('/session/hapus',[OrderController::class,'hapusSession']);
});
Route::middleware(['master'])->group(function (){
    Route::get('dashboard-master',[MasterController::class,'da_mas'])->name('dashboard.master');
    // menu
    Route::get('menu',[MasterController::class,'menu']);
    Route::post('/updatemenu', [MenuController::class, 'update_menu'])->name('updatemenu');

    Route::post('delete_menu',[MasterController::class,'delete_menu'])->name('deletemenu');
    // tambah menu
    Route::get('tambah-menu',[MasterController::class,'tambah']);
    Route::post('add',[MasterController::class,'tambah_menu']);


    Route::get('role',[RoleController::class,'role']);
    Route::post('update',[RoleController::class,'update']);




});






// Route::middleware('auth')->group(function () {
// Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
// Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
require __DIR__.'/auth.php';
