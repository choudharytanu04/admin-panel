<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('role.name')
                    ->label('Role')
                    ->badge()
                    ->searchable()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])

            ->filters([
                //
            ])

           ->recordActions([
    ViewAction::make()
        ->visible(fn () => auth()->user()?->hasPermission('user.view') ?? false),

    EditAction::make()
        ->visible(fn () => auth()->user()?->hasPermission('user.edit') ?? false),

    DeleteAction::make()
        ->visible(fn () => auth()->user()?->hasPermission('user.delete') ?? false),
])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->visible(fn () => auth()->user()?->hasPermission('user.delete') ?? false),
                ]),
            ]);
    }
}