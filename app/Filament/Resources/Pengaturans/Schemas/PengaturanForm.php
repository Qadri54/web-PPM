<?php

namespace App\Filament\Resources\Pengaturans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PengaturanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\Hidden::make('user_id')->default(fn () => auth()->id()),
                Textarea::make('address')
                    ->columnSpanFull(),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('operational_hours'),
                \Filament\Forms\Components\Repeater::make('social_media_links')
                    ->label('Tautan Media Sosial')
                    ->schema([
                        \Filament\Forms\Components\Select::make('platform')
                            ->options([
                                'facebook' => 'Facebook',
                                'instagram' => 'Instagram',
                                'youtube' => 'YouTube',
                                'twitter' => 'Twitter / X',
                                'tiktok' => 'TikTok'
                            ])
                            ->required(),
                        \Filament\Forms\Components\TextInput::make('url')
                            ->label('URL / Tautan')
                            ->url()
                            ->required(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                Textarea::make('google_maps_embed')
                    ->columnSpanFull(),
            ]);
    }
}
