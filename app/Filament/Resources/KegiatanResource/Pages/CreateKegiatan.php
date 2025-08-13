<?php

namespace App\Filament\Resources\KegiatanResource\Pages;

use App\Filament\Resources\KegiatanResource;
use App\Models\KegiatanFoto;
use Filament\Resources\Pages\CreateRecord;

class CreateKegiatan extends CreateRecord
{
    protected static string $resource = KegiatanResource::class;

    protected array $fotosTemp = [];

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->fotosTemp = $data['fotos'] ?? [];
        unset($data['fotos']);

        return $data;
    }

    protected function afterCreate(): void
    {
        if (!empty($this->fotosTemp)) {
            foreach ($this->fotosTemp as $fotoPath) {
                $this->record->fotos()->create([
                    'path'       => $fotoPath,
                    'keterangan' => null,
                ]);
            }
        }
    }

    protected function getRedirectUrl(): string
    {
        return KegiatanResource::getUrl('index');
    }
}

