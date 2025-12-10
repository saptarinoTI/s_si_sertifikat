<?php

namespace App\Filament\Resources\Bilings\Pages;

use App\Filament\Resources\Bilings\BilingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBilings extends ListRecords
{
    protected static string $resource = BilingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label("Tambah Data Biling"),
        ];
    }
}
