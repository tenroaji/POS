<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MasterBarangResource\Pages;
use App\Filament\Resources\MasterBarangResource\RelationManagers;
use App\Models\MasterBarang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MasterBarangResource extends Resource
{
    protected static ?string $model = MasterBarang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kategori_id')
                    ->relationship('kategori','nama_kategori')
                    ->preload()
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('nama_barang')
                    ->required(),
                Forms\Components\TextInput::make('harga_beli_barang')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('harga_jual_barang')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('stok_barang')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_barang')
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga_beli_barang')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('harga_jual_barang')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stok_barang')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kategori.nama_kategori')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListMasterBarangs::route('/'),
            'create' => Pages\CreateMasterBarang::route('/create'),
            'edit' => Pages\EditMasterBarang::route('/{record}/edit'),
        ];
    }
}
