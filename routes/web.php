<?php

use App\Http\Controllers\DataPenggunaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NilaiSiswaController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\HasilHitunganController;
use App\Http\Controllers\ProsesKlasterController;
use App\Http\Controllers\RiwayatAdminController;
use App\Http\Controllers\RiwayatGuruController;
use App\Http\Controllers\RombonganBelajarController;
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

Route::controller(AuthController::class)->group(function () {
	// Route::get('register', 'register')->name('register');
	// Route::post('register', 'registerSimpan')->name('register.simpan');

	// Tampilkan form login (GET /login)
	Route::get('/login', [AuthController::class, 'login'])->name('login');

	// Proses login (POST /login)
	Route::post('/login', [AuthController::class, 'loginAksi'])->name('login.post');

	// Logout (GET atau POST, tapi lebih baik POST) dengan middleware auth
	Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
});


Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});


Route::middleware('auth')->group(function () {
	Route::get('/dashboard', [DataPenggunaController::class, 'dashboard'])->name('dashboard');
	Route::resource('siswa', SiswaController::class)->middleware('auth');
	
	

Route::controller(DataPenggunaController::class)->prefix('datapengguna')->group(function () {
	Route::get('', 'index')->name('datapengguna.index');
	Route::get('create', 'create')->name('datapengguna.create');
	Route::post('create', 'store')->name('datapengguna.create.store');
	Route::get('edit/{id}', 'edit')->name('datapengguna.edit');
	Route::post('edit/{id}', 'update')->name('datapengguna.tambah.update');
	Route::get('hapus/{id}', 'hapus')->name('datapengguna.hapus');
	//Route::post('/datapengguna/import', [DataPenggunaController::class, 'import'])->name('datapengguna.import');
	Route::delete('/datapengguna/{id}', [DataPenggunaController::class, 'destroy'])->name('datapengguna.destroy');
});

Route::controller(DataSiswaController::class)->prefix('datasiswa')->group(function () {
    Route::get('', 'index')->name('datasiswa.index');
    Route::get('create', 'create')->name('datasiswa.create');
    Route::post('create', 'store')->name('datasiswa.create.store');
	Route::post('create', 'store')->name('datasiswa.store');
    Route::post('import', 'import')->name('datasiswa.import');  // <- PASTIKAN INI ADA
    Route::get('edit/{id}', 'edit')->name('datasiswa.edit');
    Route::post('edit/{id}', 'update')->name('datasiswa.tambah.update');
    Route::get('hapus/{id}', 'hapus')->name('datasiswa.hapus');  // Kalau pakai hapus (GET), kalau tidak hapus aja
    Route::delete('{id}', 'destroy')->name('datasiswa.destroy');
	Route::resource('datasiswa', DataSiswaController::class);

});

Route::controller(NilaiSiswaController::class)->prefix('nilaisiswa')->group(function () {
    Route::get('', 'index')->name('nilaisiswa.index');
    Route::get('create', 'create')->name('nilaisiswa.create');
    Route::post('create', 'store')->name('nilaisiswa.store');
    Route::get('edit/{id}', 'edit')->name('nilaisiswa.edit');
    Route::post('edit/{id}', 'update')->name('nilaisiswa.update');
    Route::get('hapus/{id}', 'hapus')->name('nilaisiswa.hapus');
    Route::delete('{id}', 'destroy')->name('nilaisiswa.destroy');
    Route::post('import', 'import')->name('nilaisiswa.import'); // jika ada fitur import
});

Route::controller(RombonganBelajarController::class)
    ->prefix('rombonganbelajar')
    ->group(function () {
        Route::get('', 'index')->name('rombonganbelajar.index');
        Route::get('create', 'create')->name('rombonganbelajar.create');
        Route::post('create', 'store')->name('rombonganbelajar.store');
        Route::get('edit/{id}', 'edit')->name('rombonganbelajar.edit');
        Route::post('edit/{id}', 'update')->name('rombonganbelajar.update');
        Route::get('hapus/{id}', 'hapus')->name('rombonganbelajar.hapus'); // jika ingin konfirmasi hapus
        Route::delete('{id}', 'destroy')->name('rombonganbelajar.destroy');
        Route::post('import', 'import')->name('rombonganbelajar.import'); // jika ada fitur import
    });

Route::controller(ProsesKlasterController::class)->prefix('prosesklaster')->group(function () {
    Route::get('', 'index')->name('prosesklaster.index');
    Route::get('create', 'create')->name('prosesklaster.create'); // tambahkan ini
    Route::get('/prosesklaster', [ProsesKlasterController::class, 'index']);
    Route::post('/prosesklaster', [ProsesKlasterController::class, 'store']);
    // Route::post('hitung', 'hitung')->name('prosesklaster.hitung');
    // Route::get('hasil', 'hasil')->name('prosesklaster.hasil');
    // Route::get('riwayat', 'riwayat')->name('prosesklaster.riwayat');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/riwayat', [RiwayatAdminController::class, 'index'])->name('riwayatadmin.index');
    Route::get('/riwayat/{id}', [RiwayatAdminController::class, 'show'])->name('riwayatadmin.show');
    Route::delete('/riwayat/{id}', [RiwayatAdminController::class, 'destroy'])->name('riwayatadmin.destroy');
});

Route::prefix('guru')->middleware(['auth'])->group(function () {
    Route::get('/riwayat', [RiwayatGuruController::class, 'index'])->name('riwayatguru.index');
    Route::get('/riwayat/{id}', [RiwayatGuruController::class, 'show'])->name('riwayatguru.show');
    Route::delete('/riwayat/{id}', [RiwayatGuruController::class, 'destroy'])->name('riwayatguru.destroy');
});

Route::prefix('guru')->middleware(['auth'])->group(function () {
    Route::get('/hasilhitungan', [HasilHitunganController::class, 'index'])->name('hasilhitungan.index');
    Route::get('/hasilhitungan/{id}', [HasilHitunganController::class, 'show'])->name('hasilhitungan.show');
    Route::delete('/hasilhitungan/{id}', [HasilHitunganController::class, 'destroy'])->name('hasilhitungan.destroy');
});


Route::middleware(['auth', 'ceklevel:Admin,Guru'])->group(function () {
    Route::get('/datasiswa', [DataSiswaController::class, 'index'])->name('datasiswa.index');
});


});
