<?php

namespace App\Filament\Resources\Sertifikats\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SertifikatsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('status', 'paid');
            })
            ->columns([
                TextColumn::make('pik.nomor_pik')
                    ->label('No. PIK')
                    ->sortable(),
                TextColumn::make('kode_biling')
                    ->label('Kode')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('print')
                    ->color('success')
                    ->label('Sertifikat')
                    ->icon('heroicon-o-printer')
                    ->url(fn ($record) => route('print.sertifikat', $record))
                    ->openUrlInNewTab(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
