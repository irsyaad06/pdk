<?php

namespace App\Filament\Resources\PengaturanResource\Pages;

use App\Filament\Resources\PengaturanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePengaturan extends CreateRecord
{
    protected static string $resource = PengaturanResource::class;

    public function getTitle(): string
    {
        return 'Pengaturan Website';
    }

    public function getBreadcrumb(): string
    {
        return 'Pengaturan Website';
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('edit', ['record' => $this->record]);
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Pengaturan berhasil dibuat';
    }
}
