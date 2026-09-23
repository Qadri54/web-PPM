<?php

namespace App\Filament\Resources\Galeris\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class GaleriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\Hidden::make('user_id')->default(fn () => auth()->id()),
                TextInput::make('title')
                    ->required(),
                FileUpload::make('image_path')->disk('public')
                    ->image()
                    ->required(),
                TextInput::make('category_label'),
                DatePicker::make('date_event'),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
