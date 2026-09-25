<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Category Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('description')
                    ->limit(50),

                IconColumn::make('status')
                    ->boolean()
                    ->label('Status'),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
                     ->recordActions([
    ViewAction::make()
        ->visible(fn () => auth()->user()?->hasPermission('category.view') ?? false),

    EditAction::make()
        ->visible(fn () => auth()->user()?->hasPermission('category.edit') ?? false),

    DeleteAction::make()
        ->visible(fn () => auth()->user()?->hasPermission('category.delete') ?? false),
])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}