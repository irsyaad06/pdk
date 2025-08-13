<?php

namespace App\Filament\Resources\PengaturanResource\Pages;

use App\Filament\Resources\PengaturanResource;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ManagePengaturan extends ManageRecords
{
    protected static string $resource = PengaturanResource::class;

    public function mount(): void
    {
        parent::mount();
        
        $pengaturan = \App\Models\Pengaturan::first();
        
        if ($pengaturan) {
            $this->redirect(PengaturanResource::getUrl('edit', ['record' => $pengaturan->id]));
        } else {
            $this->redirect(PengaturanResource::getUrl('create'));
        }
    }
}
