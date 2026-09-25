<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('password')
                    ->password()
                    ->required()
                    ->minLength(8)
                    ->dehydrated(fn ($state) => filled($state)),

                Select::make('role_id')
                    ->label('Role')
                    ->relationship('role', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
            ]);
    }
}