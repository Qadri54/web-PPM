<?php

namespace App\Filament\Resources\LinkTerkaits\Pages;

use App\Filament\Resources\LinkTerkaits\LinkTerkaitResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLinkTerkait extends EditRecord
{
    protected static string $resource = LinkTerkaitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
