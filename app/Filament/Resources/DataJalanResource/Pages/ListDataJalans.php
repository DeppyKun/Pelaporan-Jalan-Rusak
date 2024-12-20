<?php

namespace App\Filament\Resources\DataJalanResource\Pages;

use App\Filament\Resources\DataJalanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataJalans extends ListRecords
{
    protected static string $resource = DataJalanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected static ?string $title = 'Data Jalan';


}
