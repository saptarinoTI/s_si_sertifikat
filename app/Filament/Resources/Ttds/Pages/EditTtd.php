<?php

namespace App\Filament\Resources\Ttds\Pages;

use App\Filament\Resources\Ttds\TtdResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTtd extends EditRecord
{
    protected static string $resource = TtdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
