<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\Hidden::make('user_id')->default(fn () => auth()->id()),
                FileUpload::make('image_path')->disk('public')->image()->disk('public')->directory('banners')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                Textarea::make('subtitle')
                    ->columnSpanFull(),
                TextInput::make('link_cta'),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
