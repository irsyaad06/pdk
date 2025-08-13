<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    public function getTitle(): string
    {
        return 'Pengaturan Akun';
    }

    public function getBreadcrumb(): string
    {
        return 'Pengaturan Akun';
    }

    public function mount(int|string $record = 1): void
    {
        parent::mount($record);
    }
}
