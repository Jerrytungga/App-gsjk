<?php

use App\Http\Controllers\Admin\MapsController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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
    return view('home-page.index');
});


Route::get('/login-page', [Controller::class, 'login'])->name('halaman_login');
Route::get('/logout', [Controller::class, 'logout'])->name('proses_logout');
Route::post('/proses-login', [Controller::class, 'proses_login'])->name('auth.login');


Route::group(['middleware' => ['role:admin']], function() {
    Route::get('/admin/dashboard', function () {
        return view('admin-page.home');
    })->name('dashboard-admin');
    Route::resource('/admin/maps', MapsController::class);
    Route::get('/admin/balai-sidang', [AdminController::class, 'h_balaisidang'])->name('bailai-sidang');
    Route::post('/admin/balai-sidang/input', [AdminController::class,'input_balai_sidang'])->name(  'input-balai-sidang');
    Route::put('/admin/balai-sidang/edit/{id}', [AdminController::class, 'edit_balai_sidang'])->name('edit-balai-sidang');
    Route::get('/admin/kaum-saleh', [AdminController::class,'h_kaum_saleh'])->name('halaman-kaum-saleh');
    Route::post('/admin/kaum-saleh', [AdminController::class, 'input_Ksv'])->name('input-kaum-saleh');
    Route::put('/admin/kaum-saleh/{id}', [AdminController::class, 'update_Ksv'])->name('edit-kaum-saleh');
    Route::post('/admin/kaum-saleh/import', [AdminController::class, 'import'])->name('import-kaum-saleh');
    Route::get('/admin/kaum-saleh/sample', [AdminController::class, 'downloadSample'])->name('download-sample-kaum-saleh');
    Route::get('/admin/Ft-lokal', [AdminController::class,'h_ftlokal'])->name('halaman-Ft-lokal');
    Route::post('/admin/Ft-lokal', [AdminController::class,'input_ftlokal'])->name(  'input-Ft-lokal');
    Route::put('/admin/ftlokal/{id}', [AdminController::class, 'update_dataUser'])->name('edit-Ft-lokal');
    Route::get('/admin/kontakan', [AdminController::class,'h_Kontakan'])->name( 'halaman-Kontakan');
    Route::post('/admin/kontakan', [AdminController::class,'input_dataKontakan'])->name(  'input-data-kontakan');
    Route::put('/admin/kontakan/{id}', [AdminController::class, 'edit_dataKontakan'])->name('edit-data-kontakan');
    Route::delete('/admin/kontakan/{id}', [AdminController::class, 'delete_dataKontakan'])->name('delete-data-kontakan');
    Route::get('/admin/sekolah', [AdminController::class,'Daftar_sekolah'])->name(  'halaman-sekolah');
    Route::post('/admin/sekolah', [AdminController::class, 'input_dataSekolah'])->name('input-data-sekolah');
    Route::put('/admin/sekolah/{id}', [AdminController::class, 'edit_dataSekolah'])->name('edit-data-sekolah');
    Route::delete('/admin/sekolah/{id}', [AdminController::class, 'delete_dataSekolah'])->name('delete-data-sekolah');
    Route::get('/admin/universitas', [AdminController::class,'Daftar_universitas'])->name( 'halaman-universitas');
    Route::post('/admin/universitas', [AdminController::class, 'input_dataUniversitas'])->name('input-data-universitas');
    Route::put('/admin/universitas/{id}', [AdminController::class, 'edit_dataUniversitas'])->name('edit-data-universitas');
    Route::delete('/admin/universitas/{id}', [AdminController::class, 'delete_dataUniversitas'])->name('delete-data-universitas');
    Route::get('/admin/baptisan', [AdminController::class,'Daftar_baptisan'])->name( 'halaman-baptisan');

    Route::get('admin/rumah-belajar', [AdminController::class,'RB'])->name( 'halaman-rumah-belajar');
    Route::post('/admin/rumahbelajar/peserta', [AdminController::class, 'input_dataPeserta'])->name('input-data-peserta');
    Route::put('/admin/rumahbelajar/peserta/{id}', [AdminController::class, 'edit_dataPeserta'])->name('edit-data-peserta');
Route::delete('/admin/rumahbelajar/peserta/{id}', [AdminController::class, 'delete_dataPeserta'])->name('delete-data-peserta');


Route::get('/file-manager', [AdminController::class, 'File_manager'])->name('file-manager.index');
Route::post('/file-administrasi', [AdminController::class, 'input_file'])->name('file-administrasi.store');

Route::delete('/file-administrasi/{id}', [AdminController::class, 'hapus_file'])
    ->name('file-administrasi.destroy')
    ->middleware('web'); // Pastikan middleware web digunakan


    Route::get('/jadwal-sidang', [AdminController::class, 'h_jadwal_sidang'])->name('jadwal.index');

});



Route::group(['middleware' => ['role:user']], function() {
    Route::get('/user/dashboard', function () {
        return view('user-page.home');
    })->name('dashboard-user');
    Route::get('/user/kaum-saleh', [Controller::class,'h_kaum_saleh_user'])->name('halaman-kaum-saleh-user');
   

});