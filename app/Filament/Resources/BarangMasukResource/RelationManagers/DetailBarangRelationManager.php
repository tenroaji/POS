<?php

namespace App\Filament\Resources\BarangMasukResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DetailBarangRelationManager extends RelationManager
{
    protected static string $relationship = 'detail';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
//                Forms\Components\Select::make('barang_id')
//                    ->relationship('barang', 'nama_barang')
//                    ->preload()
//                    ->searchable()
//                ,
                Forms\Components\Select::make('barang_id')
                    ->relationship('barang', 'nama_barang')
                    ->preload()
                    ->searchable()
                ,
                Forms\Components\TextInput::make('jumlah'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('barang_id')
            ->columns([
                Tables\Columns\TextColumn::make('barang.nama_barang'),
                Tables\Columns\TextColumn::make('jumlah'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
