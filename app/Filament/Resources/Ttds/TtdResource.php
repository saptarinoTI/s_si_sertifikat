<?php

namespace App\Filament\Resources\Ttds;

use App\Filament\Resources\Ttds\Pages\CreateTtd;
use App\Filament\Resources\Ttds\Pages\EditTtd;
use App\Filament\Resources\Ttds\Pages\ListTtds;
use App\Filament\Resources\Ttds\Schemas\TtdForm;
use App\Filament\Resources\Ttds\Tables\TtdsTable;
use App\Models\Ttd;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class TtdResource extends Resource
{
    protected static ?string $model = Ttd::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFingerPrint;
    protected static ?string $modelLabel = "TTD Dokumen";
    protected static ?string $pluralModelLabel = "TTD Dokumen";
    protected static string|UnitEnum|null $navigationGroup = "Master Data";
    protected static ?string $slug = "ttd";
    protected static ?int $navigationSort = 0;
    public static function form(Schema $schema): Schema
    {
        return TtdForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TtdsTable::configure($table);
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
            'index' => ListTtds::route('/'),
            'create' => CreateTtd::route('/create'),
            'edit' => EditTtd::route('/{record}/edit'),
        ];
    }
}
