<?php

namespace App\Filament\Resources\TugasFungsis;

use App\Filament\Resources\TugasFungsis\Pages;
use App\Models\TugasFungsi;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class TugasFungsiResource extends Resource
{
    protected static ?string $model = TugasFungsi::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-list-bullet';
    protected static \UnitEnum|string|null $navigationGroup = '7. Halaman Profil';
    protected static ?string $navigationLabel = 'Tugas Pokok & Fungsi';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('title')
                    ->label('Judul Poin (Misal: Fungsi Perencanaan)')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi / Isi Poin')
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')
                    ->label('Aktifkan')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('order')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->label('Judul Poin'),
                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->label('Deskripsi'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Status'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListTugasFungsis::route('/'),
            'create' => Pages\CreateTugasFungsi::route('/create'),
            'edit' => Pages\EditTugasFungsi::route('/{record}/edit'),
        ];
    }
}