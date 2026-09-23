<?php

namespace App\Filament\Resources\Profils\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProfilForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\Hidden::make('user_id')->default(fn () => auth()->id()),
                FileUpload::make('sambutan_image')->disk('public')
                    ->image(),
                TextInput::make('sambutan_name'),
                TextInput::make('sambutan_title'),
                Textarea::make('sambutan_text')
                    ->columnSpanFull(),
                FileUpload::make('struktur_image')->disk('public')
                    ->image(),
            ]);
    }
}
