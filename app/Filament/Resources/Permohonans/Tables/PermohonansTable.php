<?php

namespace App\Filament\Resources\Permohonans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PermohonansTable
{
    public static function configure(Table $table): Table
    {
        return $table
        //    ->modifyQueryUsing(function (Builder $query) {
        //         return $query->where('status', 'baru');
        //     })
            ->columns([
                TextColumn::make('nomor_pik')->label("Nomor PIK")->searchable(),
                TextColumn::make('nama_pengirim')->label("Nama Pengirim")->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn($state): string => ucwords($state))
                    ->color(fn(string $state): string => match ($state) {
                        "baru" => "gray",
                        "diverifikasi" => "primary",
                        "ditolak" => "danger",
                        "menunggu_bayar" => "warning",
                        "lunas" => "success",
                        "sertifikat_terbit" => "success",
                    })
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()->label('Verifikasi Data'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Hapus pilihan'),
                ]),
            ]);
    }
}
