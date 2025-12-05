<?php

namespace App\Filament\Resources\Bilings\RelationManagers;

use App\Filament\Resources\Bilings\BilingResource;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Schemas\Schema;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';
    protected static ?string $title = 'Detail Kuitansi';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('uraian')->required(),
                TextInput::make('volume')->numeric()->required(),
                TextInput::make('tarif')->numeric()->required(),
                TextInput::make('tarif')->numeric()->required(),
                TextInput::make('tarif')->numeric()->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('uraian'),
                TextColumn::make('volume'),
                TextColumn::make('tarif')->money('idr'),
                TextColumn::make('jumlah')->money('idr'),
            ])
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
