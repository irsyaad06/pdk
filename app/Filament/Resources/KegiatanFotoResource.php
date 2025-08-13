<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KegiatanFotoResource\Pages;
use App\Filament\Resources\KegiatanFotoResource\RelationManagers;
use App\Models\KegiatanFoto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class KegiatanFotoResource extends Resource
{
    protected static ?string $model = KegiatanFoto::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Banner Kegiatan';

    protected static ?string $pluralModelLabel = 'Banner Kegiatan';

    protected static ?string $navigationGroup = 'Kegiatan';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('kegiatan_id')
                    ->relationship('kegiatan', 'judul')
                    ->required()
                    ->searchable()
                    ->preload(),

                FileUpload::make('path')
                    ->label('Foto')
                    ->multiple()
                    ->image()
                    ->directory('kegiatan-foto')
                    ->maxFiles(10)
                    ->maxSize(5120)
                    ->required()
                    ->helperText('Upload maksimal 10 foto dengan ukuran maksimal 5MB per foto'),

                Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->maxLength(255)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('path')
                    ->label('Foto')
                    ->circular(),

                TextColumn::make('kegiatan.judul')
                    ->label('Kegiatan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->limit(50),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKegiatanFotos::route('/'),
            'create' => Pages\CreateKegiatanFoto::route('/create'),
            'edit' => Pages\EditKegiatanFoto::route('/{record}/edit'),
        ];
    }
}
