<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\laporan\PBBController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
