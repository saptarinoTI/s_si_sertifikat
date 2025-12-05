<?php

namespace App\Filament\Resources\Bilings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BilingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pik.nomor_pik')
                    ->label("No. PIK")
                    ->sortable(),
                TextColumn::make('kode_biling')
                    ->label("Kode")
                    ->searchable(),
                TextColumn::make('total')
                    ->money('IDR'),
                TextColumn::make('tanggal_biling')
                    ->label("Tgl. Biling")
                    ->date()
                    ->sortable(),
                TextColumn::make('tanggal_kadaluarsa')
                    ->label("Tgl. Kadaluarsa")
                    ->date()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->sortable(),
                TextColumn::make('tanggal_bayar')
                    ->label("Tgl. Bayar")
                    ->date()
                    ->sortable(),
                TextColumn::make('bukti_pembayaran')
                    ->label("Pembayaran"),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
