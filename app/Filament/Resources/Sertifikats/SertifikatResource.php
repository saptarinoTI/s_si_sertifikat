<?php

namespace App\Filament\Resources\Sertifikats;

use App\Filament\Resources\Sertifikats\Pages\CreateSertifikat;
use App\Filament\Resources\Sertifikats\Pages\EditSertifikat;
use App\Filament\Resources\Sertifikats\Pages\ListSertifikats;
use App\Filament\Resources\Sertifikats\Schemas\SertifikatForm;
use App\Filament\Resources\Sertifikats\Tables\SertifikatsTable;
use App\Models\Biling;
use App\Models\Sertifikat;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;


class SertifikatResource extends Resource
{
    protected static ?string $model = Biling::class;
   protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocument;

    protected static ?string $modelLabel = 'Sertifikat';
    protected static ?string $pluralModelLabel = 'Sertifikat';
    protected static string|UnitEnum|null $navigationGroup = 'Master Data';
    protected static ?string $slug = 'sertifikat';
    protected static ?int $navigationSort = 4;
    protected static ?string $recordTitleAttribute = 'Sertifikat';

    public static function form(Schema $schema): Schema
    {
        return SertifikatForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SertifikatsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSertifikats::route('/'),
        ];
    }
}
