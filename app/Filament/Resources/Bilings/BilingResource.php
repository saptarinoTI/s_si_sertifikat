<?php

namespace App\Filament\Resources\Bilings;

use App\Filament\Resources\Bilings\Pages\CreateBiling;
use App\Filament\Resources\Bilings\Pages\EditBiling;
use App\Filament\Resources\Bilings\Pages\ListBilings;
use App\Filament\Resources\Bilings\RelationManagers\ItemsRelationManager;
use App\Filament\Resources\Bilings\RelationManagers\KuitansisRelationManager;
use App\Filament\Resources\Bilings\Schemas\BilingForm;
use App\Filament\Resources\Bilings\Tables\BilingsTable;
use App\Models\Biling;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class BilingResource extends Resource
{
    protected static ?string $model = Biling::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;
    protected static ?string $modelLabel = "Data Biling";
    protected static ?string $pluralModelLabel = "Data Biling";
    protected static string|UnitEnum|null $navigationGroup = "Master Data";
    protected static ?string $slug = "biling";
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return BilingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BilingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [KuitansisRelationManager::class, ItemsRelationManager::class];
    }

    public static function getPages(): array
    {
        return [
            "index" => ListBilings::route("/"),
            "create" => CreateBiling::route("/create"),
            "edit" => EditBiling::route("/{record}/edit"),
        ];
    }
}
