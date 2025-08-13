<?php

namespace App\Filament\Resources\KegiatanFotoResource\Pages;

use App\Filament\Resources\KegiatanFotoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKegiatanFoto extends EditRecord
{
    protected static string $resource = KegiatanFotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
