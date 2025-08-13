<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengaturanResource\Pages;
use App\Models\Pengaturan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class PengaturanResource extends Resource
{
    protected static ?string $model = Pengaturan::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Pengaturan Website';

    protected static ?string $modelLabel = 'Pengaturan Website';

    protected static ?string $pluralModelLabel = 'Pengaturan Website';

    protected static ?string $navigationGroup = 'Pengaturan';

    protected static ?int $navigationSort = 999;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Umum')
                    ->schema([
                        Forms\Components\FileUpload::make('logo')
                            ->label('Logo Website')
                            ->image()
                            ->directory('pengaturan')
                            ->maxSize(2048)
                            ->helperText('Format: JPG, PNG. Maksimal 2MB'),

                        Forms\Components\TextInput::make('nama_app')
                            ->label('Nama Aplikasi')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\FileUpload::make('fav_icon')
                            ->label('Favicon')
                            ->image()
                            ->directory('pengaturan')
                            ->maxSize(1024)
                            ->helperText('Format: ICO, PNG. Maksimal 1MB'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Kontak')
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('no_wa')
                            ->label('Nomor WhatsApp')
                            ->tel()
                            ->maxLength(20),

                        Forms\Components\TextInput::make('no_telepon')
                            ->label('Nomor Telepon')
                            ->tel()
                            ->maxLength(20),
                    ])
                    ->columns(3),

                Forms\Components\Section::make('Sosial Media')
                    ->schema([
                        Forms\Components\TextInput::make('link_instagram')
                            ->label('Instagram')
                            ->url()
                            ->maxLength(255)
                            ->prefix('https://'),

                        Forms\Components\TextInput::make('link_tiktok')
                            ->label('TikTok')
                            ->url()
                            ->maxLength(255)
                            ->prefix('https://'),

                        Forms\Components\TextInput::make('link_x')
                            ->label('Twitter/X')
                            ->url()
                            ->maxLength(255)
                            ->prefix('https://'),

                        Forms\Components\TextInput::make('link_facebook')
                            ->label('Facebook')
                            ->url()
                            ->maxLength(255)
                            ->prefix('https://'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo')
                    ->circular(),
                Tables\Columns\TextColumn::make('nama_app')
                    ->label('Nama Aplikasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_wa')
                    ->label('WhatsApp'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePengaturan::route('/'),
            'create' => Pages\CreatePengaturan::route('/create'),
            'edit' => Pages\EditPengaturan::route('/{record}/edit'),
        ];
    }

    public static function shouldSkipNavigation(): bool
    {
        return true;
    }

    public static function getNavigationUrl(): string
    {
        $pengaturan = Pengaturan::first();

        if ($pengaturan) {
            return static::getUrl('edit', ['record' => $pengaturan->id]);
        }

        return static::getUrl('create');
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->limit(1);
    }
}
