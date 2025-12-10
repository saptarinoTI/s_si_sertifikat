<?php

namespace App\Filament\Resources\Ttds\Pages;

use App\Filament\Resources\Ttds\TtdResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTtds extends ListRecords
{
    protected static string $resource = TtdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Data'),
        ];
    }
}
