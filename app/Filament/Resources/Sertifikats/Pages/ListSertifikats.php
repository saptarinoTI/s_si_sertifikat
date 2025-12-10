<?php

namespace App\Filament\Resources\Sertifikats\Pages;

use App\Filament\Resources\Sertifikats\SertifikatResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSertifikats extends ListRecords
{
    protected static string $resource = SertifikatResource::class;
}
