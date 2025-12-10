<?php

namespace App\Filament\Resources\Bilings\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BilingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pik.nomor_pik')
                    ->label('No. PIK')
                    ->sortable(),
                TextColumn::make('kode_biling')
                    ->label('Kode')
                    ->searchable(),
                TextColumn::make('total')
                    ->money('IDR'),
                TextColumn::make('tanggal_biling')
                    ->label('Tgl. Biling')
                    ->date()
                    ->sortable(),
                TextColumn::make('tanggal_kadaluarsa')
                    ->label('Tgl. Kadaluarsa')
                    ->date()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->sortable(),
                TextColumn::make('tanggal_bayar')
                    ->label('Tgl. Bayar')
                    ->date()
                    ->sortable(),
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
                Action::make('print')
                    ->color('success')
                    ->label('Kuitansi')
                    ->icon('heroicon-o-printer')
                    ->url(fn ($record) => route('print.kuitansi', $record))
                    ->openUrlInNewTab()
                    ->visible(fn ($record) => $record->status === 'paid'),
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
