<?php

namespace App\Filament\Resources\LinkTerkaits\Pages;

use App\Filament\Resources\LinkTerkaits\LinkTerkaitResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLinkTerkaits extends ListRecords
{
    protected static string $resource = LinkTerkaitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
