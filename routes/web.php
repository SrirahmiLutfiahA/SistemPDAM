<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
use App\Models\Pengaduan;

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

Route::get('/', function () {
    return view('welcome_home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/data', [App\Http\Controllers\AdminController::class, 'data'])->name('data');
Route::get('/laporan', [App\Http\Controllers\AdminController::class, 'laporan'])->name('laporan');
Route::get('/print/{tglAwal}/{tglAkhir}', [App\Http\Controllers\AdminController::class, 'print'])->name('print');
// Route::get('/report', [App\Http\Controllers\AdminController::class, 'report'])->name('report');
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/petugas', [App\Http\Controllers\PetugasController::class, 'index'])->name('petugas');
Route::resource('aduan', PengaduanController::class);
Route::get('/riwayat', function(){
    $pengaduan = Pengaduan::with('user')->get();
    return view('user.riwayat', ['pengaduan'=> $pengaduan]);
})->name('riwayat');

// require __DIR__.'/auth.php';
