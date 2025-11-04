<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppLogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\laporan\PBBController;
use App\Http\Controllers\API\DocumentController;
use App\Http\Controllers\API\IdentityController;
use App\Http\Controllers\laporan\BPHTBController;
use App\Http\Controllers\laporan\PajakDaerahController;
use App\Http\Controllers\laporan\PenerimaanOpdController;
use App\Http\Controllers\laporan\RetribusiDaerahController;
use App\Http\Controllers\laporan\PendapatanDaerahController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/laporan/pendapatan-daerah', [PendapatanDaerahController::class, 'index'])
    ->name('laporan.pendapatan-daerah');
Route::get('/laporan/pajak-daerah', [PajakDaerahController::class, 'index'])
    ->name('laporan.pajak-daerah');
Route::get('/laporan/retribusi-daerah', [RetribusiDaerahController::class, 'index'])
    ->name('laporan.retribusi-daerah');
Route::get('/laporan/pbb', [PBBController::class, 'index'])
    ->name('laporan.pbb');
Route::get('/laporan/bphtb', [BPHTBController::class, 'index'])
    ->name('laporan.bphtb');
Route::get('/laporan/penerimaan-opd', [PenerimaanOpdController::class, 'index'])
    ->name('laporan.penerimaan-opd');

Route::get('/dokumen-publish', [DocumentController::class, 'documentPublicShow'])->name('document.index_public');
Route::post('/dokumen/{id}/download', [DocumentController::class, 'download'])->name('document.download');

Route::middleware('auth', 'role:admin|superadmin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/app-logs', [AppLogController::class, 'index'])->name('logs.index');
    Route::get('/app-logs/{id}', [AppLogController::class, 'show'])->name('logs.show');

    Route::get('/dokumen', [DocumentController::class, 'documentShow'])->name('document.index');
    Route::get('/dokumen/create', [DocumentController::class, 'create'])->name('document.create');
    Route::get('/dokumen/{id}/edit', [DocumentController::class, 'edit'])->name('document.edit');
    Route::post('/dokumen', [DocumentController::class, 'store'])->name('document.store');

    Route::get('/identitas', [IdentityController::class, 'identityShow'])->name('identity.index');
    Route::post('/identitas', [IdentityController::class, 'store'])->name('identity.store');
});

require __DIR__.'/auth.php';
