<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Contracts\View\View;
use App\Models\LaporanJalan;

class InteractiveMaps extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static string $view = 'filament.pages.interactive-maps';

    protected static ?string $title = 'Peta Sebaran Jalan Rusak';
    protected static ?string $navigationLabel = 'Maps';

    public $locations; // Properti untuk menyimpan data

    // Menarik data dari database
    public function mount()
    {
        // Mengambil data laporan jalan bersama dengan koordinatnya
        $this->locations = LaporanJalan::with('koordinat')->get();
    }

}
