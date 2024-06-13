<?php

use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\master\MasterController;
use App\Http\Controllers\master\RoleController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
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


    Route::post('/order', [MenuController::class, 'order']);
    Route::get('/m', [OrderController::class, 'hasil']);

    Route::get('halaman',[OrderController::class,'men']);

    // Page Orderan
    // Route::get('orderan',function()
    // {
    //  return view('admin.halaman');
    // });

// Route::resource('transaksi', TransaksiController::class,'');




});
Route::middleware(['master'])->group(function (){
    Route::get('dashboard-master',[MasterController::class,'da_mas'])->name('dashboard.master');

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
