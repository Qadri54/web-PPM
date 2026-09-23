<?php

namespace App\Filament\Resources\LinkTerkaits;

use App\Filament\Resources\LinkTerkaits\Pages\CreateLinkTerkait;
use App\Filament\Resources\LinkTerkaits\Pages\EditLinkTerkait;
use App\Filament\Resources\LinkTerkaits\Pages\ListLinkTerkaits;
use App\Filament\Resources\LinkTerkaits\Schemas\LinkTerkaitForm;
use App\Filament\Resources\LinkTerkaits\Tables\LinkTerkaitsTable;
use App\Models\LinkTerkait;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LinkTerkaitResource extends Resource
{
    protected static ?string $model = LinkTerkait::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedLink;

    protected static ?string $pluralModelLabel = 'Mitra & Tautan';
    protected static \UnitEnum|string|null $navigationGroup = '5. Konfigurasi Sistem';

    public static function form(Schema $schema): Schema
    {
        return LinkTerkaitForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LinkTerkaitsTable::configure($table);
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
            'index' => ListLinkTerkaits::route('/'),
            'create' => CreateLinkTerkait::route('/create'),
            'edit' => EditLinkTerkait::route('/{record}/edit'),
        ];
    }
}
