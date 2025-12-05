<?php

namespace App\Filament\Resources\Bilings\Pages;

use App\Filament\Resources\Bilings\BilingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBiling extends EditRecord
{
    protected static string $resource = BilingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
