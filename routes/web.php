<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GPSController;

Route::get('/', function () {
    return view('vendor/filament-panels.pages.auth.login');
});

Route::redirect('/', '/admin/login');

use App\Filament\Resources\LaporanJalanResource;

Route::get('/laporan/create', [LaporanJalanResource::class, 'create'])->name('laporan.create');

Route::get('/laporan', \App\Filament\Pages\LaporanTamuPage::class)->name('laporan.tamu');
