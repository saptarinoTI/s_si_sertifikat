<?php

namespace App\Filament\Resources\Permohonans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PermohonanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_umum')->disabled(),
                TextInput::make('nama_ilmiah')->disabled(),
                TextInput::make('bentuk')->disabled(),
                TextInput::make('jumlah')->disabled(),
                TextInput::make('bahan_kemasan')->disabled(),
                TextInput::make('tanda_kemasan')->disabled(),
                TextInput::make('peti_kemas')->disabled(),
                TextInput::make('nama_pengirim')->disabled(),
                Textarea::make('alamat_pengirim')->columnSpanFull()->rows(4)->disabled(),
                TextInput::make('lainnya_pengirim')->disabled(),
                TextInput::make('nama_penerima')->disabled(),
                Textarea::make('alamat_penerima')->columnSpanFull()->rows(4)->disabled(),
                TextInput::make('lainnya_penerima')->disabled(),
                TextInput::make('tujuan_pengeluaran')->disabled(),
                TextInput::make('area_asal')->disabled(),
                TextInput::make('area_tujuan')->disabled(),
                TextInput::make('alat_angkut')->disabled(),
                DatePicker::make('tanggal_berangkat')->disabled(),
                Select::make('status')
                    ->options([
                        "baru" => "Baru",
                        "diverifikasi" => "Diverifikasi",
                        "ditolak" => "Ditolak",
                    ])
                    ->columnSpanFull()
                    ->required(),
            ]);
    }
}
