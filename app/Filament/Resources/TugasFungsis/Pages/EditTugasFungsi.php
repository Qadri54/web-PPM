<?php

namespace App\Filament\Resources\TugasFungsis\Pages;

use App\Filament\Resources\TugasFungsis\TugasFungsiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTugasFungsi extends EditRecord
{
    protected static string $resource = TugasFungsiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
