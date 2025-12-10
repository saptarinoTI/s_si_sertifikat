<?php

namespace App\Filament\Resources\Bilings\RelationManagers;

use App\Filament\Resources\Bilings\BilingResource;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Schemas\Schema;

class KuitansisRelationManager extends RelationManager
{
    protected static string $relationship = "kuitansis";
    protected static ?string $title = "Daftar Kuitansi";

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make("nomor_kuitansi")
                ->label("Nomor Kuitansi")
                ->required(),
            DatePicker::make("tanggal")->label("Tanggal Kuitansi")->required(),
            TextInput::make("satker")->label("Satker/ Wilker")->required(),
            TextInput::make("jumlah")->label("Jumlah (Rp.)")->required(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("nomor_kuitansi")->label("Nomor Kuitansi"),
                TextColumn::make("tanggal")
                    ->label("Tanggal Kuitansi")
                    ->formatStateUsing(
                        fn($state) => date("d F Y", strtotime($state)),
                    ),
                TextColumn::make("satker")->label("Satker/ Wilker"),
                TextColumn::make("jumlah")->label("Jumlah (Rp.)")->money("idr"),
            ])
            ->headerActions([CreateAction::make()->label("Tambah Data")])
            ->recordActions([EditAction::make(), DeleteAction::make()]);
    }
}
