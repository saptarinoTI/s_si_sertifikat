<?php

namespace App\Filament\Resources\Bilings\Pages;

use App\Filament\Resources\Bilings\BilingResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBiling extends ViewRecord
{
    protected static string $resource = BilingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->label('Edit Data'),
            Action::make('print')
                ->color('success')
                ->label('Print Biling')
                ->icon('heroicon-o-printer')
                ->url(fn ($record) => route('print.biling', $record))
                ->openUrlInNewTab(),
        ];
    }
}
