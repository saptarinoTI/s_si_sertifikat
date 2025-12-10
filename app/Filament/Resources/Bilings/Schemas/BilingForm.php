<?php

namespace App\Filament\Resources\Bilings\Schemas;

use App\Models\Pik;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BilingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_biling')
                    ->default(fn () => rand(10000000000, 99999999999)) // 8 digit numeric
                    ->readOnly()
                    ->required()
                    ->columnSpanFull(),
                Select::make('pik_id')
                    ->label('Nomor PIK')
                    ->options(Pik::query()->where('status', 'diverifikasi')->pluck('nomor_pik', 'id'))
                    ->searchable()
                    ->required(),
                TextInput::make('total')
                    ->required(),
                DatePicker::make('tanggal_biling')
                    ->required(),
                DatePicker::make('tanggal_kadaluarsa')
                    ->required(),
                Select::make('status')
                    ->options(['pending' => 'Pending', 'paid' => 'Paid', 'expired' => 'Expired'])
                    ->required(),
                DatePicker::make('tanggal_bayar'),
                TextInput::make('ntp')
                    ->label('NTB')
                    ->nullable(),
                TextInput::make('ntpn')
                    ->label('NTPN')
                    ->nullable(),
                TextInput::make('bank')
                    ->nullable(),
                TextInput::make('channel_bayar')
                    ->label('Channel Bayar')
                    ->nullable(),
                FileUpload::make('bukti_pembayaran')
                    ->columnSpanFull(),
            ]);
    }
}
