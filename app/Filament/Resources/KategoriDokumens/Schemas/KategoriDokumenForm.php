<?php

namespace App\Filament\Resources\KategoriDokumens\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KategoriDokumenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\Hidden::make('user_id')->default(fn () => auth()->id()),
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
