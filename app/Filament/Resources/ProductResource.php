<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationGroup = 'Gestão Bling';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-template';

    protected static ?string $modelLabel = 'Produto';

    protected static ?string $pluralModelLabel = 'Produtos';

    protected static ?string $slug = 'produtos';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('parent_id', null);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('bling_id')
                    ->label('ID no Bling')
                    ->disabled(),
                Forms\Components\TextInput::make('sku')
                    ->label('SKU'),
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required(),
                Forms\Components\TextInput::make('name_br')
                    ->label('Nome traduzido'),
                Forms\Components\Toggle::make('highlights')
                    ->label('Produto em destaque?'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
            ->actions([
                Tables\Actions\EditAction::make()->label('')->tooltip('Editar'),
            ])
            ->bulkActions([
//                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\SubproductsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'edit' => Pages\EditProduct::route('/{record}/editar'),
        ];
    }
}
