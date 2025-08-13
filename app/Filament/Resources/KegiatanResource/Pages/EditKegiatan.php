<?php

namespace App\Filament\Resources\KegiatanResource\Pages;

use App\Filament\Resources\KegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKegiatan extends EditRecord
{
    protected static string $resource = KegiatanResource::class;

    protected array $fotosTemp = [];

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->fotosTemp = $data['fotos'] ?? [];
        unset($data['fotos']);

        return $data;
    }

    protected function afterSave(): void
    {
        // Hapus foto lama
        $this->record->fotos()->delete();

        // Simpan foto baru
        foreach ($this->fotosTemp as $fotoPath) {
            $this->record->fotos()->create([
                'path'       => $fotoPath,
                'keterangan' => null,
            ]);
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }


     protected function getRedirectUrl(): string
    {
        return KegiatanResource::getUrl('index');
    }
}
