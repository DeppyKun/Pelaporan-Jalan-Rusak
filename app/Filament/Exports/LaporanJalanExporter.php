<?php

namespace App\Filament\Exports;

use App\Models\LaporanJalan;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class LaporanJalanExporter extends Exporter
{
    protected static ?string $model = LaporanJalan::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('nama_jalan'),
            ExportColumn::make('kelurahan'),
            ExportColumn::make('lingkungan'),
            ExportColumn::make('rt'),
            ExportColumn::make('rw'),
            ExportColumn::make('panjang_jalan'),
            ExportColumn::make('lebar_jalan'),
            ExportColumn::make('kondisi'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your laporan jalan export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
