<?php

namespace App\Filament\Resources\Bilings\RelationManagers;

use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $title = 'Detail Kuitansi';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('uraian')->required(),
                TextInput::make('volume')->required(),
                TextInput::make('tarif')->required(),
                TextInput::make('satuan')->required(),
                TextInput::make('jumlah')->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('uraian'),
                TextColumn::make('volume')
                    ->label('Volume x frek.'),
                TextColumn::make('tarif')
                    ->money('idr')
                    ->label('Tarif'),
                TextColumn::make('satuan'),
                TextColumn::make('jumlah')
                    ->money('idr')
                    ->label('Jumlah'),
            ])
            ->headerActions([
                CreateAction::make()->label('Tambah Data'),
            ])
            ->recordActions([EditAction::make(), DeleteAction::make()]);

    }
}
