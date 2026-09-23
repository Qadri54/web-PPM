<?php

namespace App\Filament\Resources\Dokumens\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class DokumenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kategori_id')
                    ->label('Kategori Dokumen')
                    ->relationship('kategori', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                Hidden::make('user_id')
                    ->default(fn () => auth()->id()),
                TextInput::make('code')
                    ->label('Kode Dokumen')
                    ->required(),
                TextInput::make('name')
                    ->label('Nama Dokumen')
                    ->required(),
                TextInput::make('tahun_terbit')
                    ->label('Tahun Terbit')
                    ->numeric()
                    ->required(),
                FileUpload::make('file_path')->disk('public')
                    ->label('File Dokumen (PDF)')
                    ->directory('dokumen-sop')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(),
            ]);
    }
}
