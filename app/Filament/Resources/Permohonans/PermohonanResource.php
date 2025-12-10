<?php

namespace App\Filament\Resources\Permohonans;

use App\Filament\Resources\Permohonans\Pages\CreatePermohonan;
use App\Filament\Resources\Permohonans\Pages\EditPermohonan;
use App\Filament\Resources\Permohonans\Pages\ListPermohonans;
use App\Filament\Resources\Permohonans\Pages\ViewPermohonan;
use App\Filament\Resources\Permohonans\Schemas\PermohonanForm;
use App\Filament\Resources\Permohonans\Schemas\PermohonanInfolist;
use App\Filament\Resources\Permohonans\Tables\PermohonansTable;
use App\Models\Permohonan;
use App\Models\Pik;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PermohonanResource extends Resource
{
    protected static ?string $model = Pik::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentPlus;

    protected static ?string $modelLabel = 'Permohonan';
    protected static ?string $pluralModelLabel = 'Permohonan';
    protected static string|UnitEnum|null $navigationGroup = 'Master Data';
    protected static ?string $slug = 'permohonan';
    protected static ?int $navigationSort = 1;


    public static function form(Schema $schema): Schema
    {
        return PermohonanForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PermohonanInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PermohonansTable::configure($table);
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
            'index' => ListPermohonans::route('/'),
            'edit' => EditPermohonan::route('/{record}/edit'),
        ];
    }
}
