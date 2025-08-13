<?php

namespace App\Filament\Resources\KegiatanFotoResource\Pages;

use App\Filament\Resources\KegiatanFotoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKegiatanFotos extends ListRecords
{
    protected static string $resource = KegiatanFotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
