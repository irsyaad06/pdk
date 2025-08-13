<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password as PasswordRule;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    
    protected static ?string $navigationLabel = 'Pengaturan Akun';
    
    protected static ?string $breadcrumb = 'Pengaturan Akun';
    
    protected static ?string $label = 'Pengaturan Akun';
    
    protected static bool $shouldRegisterNavigation = true;
    
    protected static ?string $navigationGroup = 'Pengaturan';
    
    protected static ?int $navigationSort = 999;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Akun')
                    ->description('Kelola informasi akun Anda')
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                    ]),
                    
                Forms\Components\Section::make('Ganti Password')
                    ->description('Isi untuk mengubah password')
                    ->schema([
                        Forms\Components\TextInput::make('password')
                            ->label('Password Baru')
                            ->password()
                            ->rule(PasswordRule::default())
                            ->confirmed()
                            ->dehydrated()
                            ->afterStateHydrated(function (Forms\Components\TextInput $component, $state) {
                                $component->state('');
                            }),
                            
                        Forms\Components\TextInput::make('password_confirmation')
                            ->label('Konfirmasi Password Baru')
                            ->password()
                            ->dehydrated(false),
                    ])
                    ->columns(2),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => EditUser::route('/'),
            'create' => CreateUser::route('/create'),
        ];
    }
    
    public static function canViewAny(): bool
    {
        return true;
    }
    
    public static function canCreate(): bool
    {
        return User::count() === 0;
    }
}
