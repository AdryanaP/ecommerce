<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubproductsRelationManager extends RelationManager
{
    protected static string $relationship = 'subproducts';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $modelLabel = 'Subproduto';

    protected static ?string $pluralModelLabel = 'Subprodutos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ColorColumn::make('color.color_hex')
                    ->label(''),
                Tables\Columns\TextColumn::make('name')
                    ->label('Produto')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('stock')
                    ->label('Em estoque')
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Preço de venda')
                    ->prefix('R$ ')
                    ->sortable(),
                Tables\Columns\TextColumn::make('bling_id')
                    ->label('ID no Bling')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable()
                    ->sortable(),
            ])
            ->defaultSort('name')
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('')->tooltip('Editar'),
            ])
            ->bulkActions([
//                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
