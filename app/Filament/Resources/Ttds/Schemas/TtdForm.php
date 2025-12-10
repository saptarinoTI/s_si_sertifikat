<?php

namespace App\Filament\Resources\Ttds\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TtdForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('nomor')
                    ->label('NIP')
                    ->required(),
                Toggle::make('status')
                    ->label('Aktif')
                    ->default(false)
                    ->reactive()
                    ->helperText('Hanya satu data yang boleh aktif.'),
            ]);
    }
}
