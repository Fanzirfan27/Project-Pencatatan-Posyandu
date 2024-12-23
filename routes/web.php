<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminLaporanController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AnggotaPosyanduController;
use App\Http\Controllers\JenisPemeriksaanController;
use App\Http\Controllers\PetugasDashboardController;
use App\Http\Controllers\PengelolaanAnggotaController;
use App\Http\Controllers\PencatatanKesehatanController;



Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware(['Petugas'])->group(function () {
    Route::get('/dashboard/petugas', [PetugasDashboardController::class, 'index'])->name('home_petugas');
    
    Route::get('/anggota-posyandu', [AnggotaPosyanduController::class, 'index'])->name('anggota-posyandu.index');
    Route::get('anggota-posyandu/create', [AnggotaPosyanduController::class, 'create'])->name('anggota-posyandu.create');
    Route::post('anggota-posyandu/store', [AnggotaPosyanduController::class, 'store'])->name('anggota-posyandu.store');
    Route::get('anggota-posyandu/{id}/edit', [AnggotaPosyanduController::class, 'edit'])->name('anggota-posyandu.edit');
    Route::put('anggota-posyandu/{id}/update', [AnggotaPosyanduController::class, 'update'])->name('anggota-posyandu.update');
    Route::delete('anggota-posyandu/{id}', [AnggotaPosyanduController::class, 'destroy'])->name('anggota-posyandu.destroy');

    Route::get('/pencatatan-kesehatan', [PencatatanKesehatanController::class, 'index'])->name('pencatatan-kesehatan.index');
    Route::get('pencatatan-kesehatan/create', [PencatatanKesehatanController::class, 'create'])->name('pencatatan-kesehatan.create');
    Route::post('pencatatan-kesehatan', [PencatatanKesehatanController::class, 'store'])->name('pencatatan-kesehatan.store');
    Route::get('pencatatan-kesehatan/{id}', [PencatatanKesehatanController::class, 'show'])->name('pencatatan-kesehatan.show');
    Route::get('pencatatan-kesehatan/{id}/edit', [PencatatanKesehatanController::class, 'edit'])->name('pencatatan-kesehatan.edit');
    Route::put('pencatatan-kesehatan/{id}', [PencatatanKesehatanController::class, 'update'])->name('pencatatan-kesehatan.update');
    Route::delete('pencatatan-kesehatan/{id}', [PencatatanKesehatanController::class, 'destroy'])->name('pencatatan-kesehatan.destroy');

    Route::get('/laporan-pencatatan-kesehatan', [PencatatanKesehatanController::class, 'laporan'])->name('pencatatan-kesehatan.laporan');
    Route::get('/laporan-pencatatan-kesehatan/export-excel', [PencatatanKesehatanController::class, 'exportToExcel'])->name('pencatatan-kesehatan.export-excel');
    Route::get('/laporan-pencatatan-kesehatan/export-word', [PencatatanKesehatanController::class, 'exportToWord'])->name('pencatatan-kesehatan.export-word');

});

Route::middleware(['Admin'])->group(function () {
    Route::get('/dashboard/admin', [AdminDashboardController::class, 'index'])->name('home_admin');

    Route::get('/pengelolaan-anggota', [PengelolaanAnggotaController::class, 'index'])->name('pengelolaan-anggota.index');

    Route::get('/jenis_pemeriksaan', [JenisPemeriksaanController::class, 'index'])->name('jenis_pemeriksaan.index');
    Route::get('/jenis_pemeriksaan/create', [JenisPemeriksaanController::class, 'create'])->name('jenis_pemeriksaan.create');
    Route::post('/jenis_pemeriksaan', [JenisPemeriksaanController::class, 'store'])->name('jenis_pemeriksaan.store');
    Route::get('/jenis_pemeriksaan/{id}/edit', [JenisPemeriksaanController::class, 'edit'])->name('jenis_pemeriksaan.edit');
    Route::put('/jenis_pemeriksaan/{id}', [JenisPemeriksaanController::class, 'update'])->name('jenis_pemeriksaan.update');
    Route::delete('/jenis_pemeriksaan/{id}', [JenisPemeriksaanController::class, 'destroy'])->name('jenis_pemeriksaan.destroy');

    Route::get('/laporan-admin', [AdminLaporanController::class, 'laporan'])->name('admin.laporan');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
