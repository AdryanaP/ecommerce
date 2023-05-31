<?php

namespace App\Filament\Resources;

use App\Enums\OrderStatus;
use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationGroup = 'Minha loja';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-archive';

    protected static ?string $modelLabel = 'Pedido';

    protected static ?string $pluralModelLabel = 'Pedidos';

    protected static ?string $slug = 'pedidos';

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', OrderStatus::CREATED)->count();
    }

    protected static function getNavigationBadgeColor(): ?string
    {
        return 'success';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('status')->disabled(),
                Forms\Components\TextInput::make('customer_name')->disabled()->label('Nome do cliente'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('#')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Situção')
                    ->colors([
                        'success' => 'aprovado e capturado'
                    ]),
                Tables\Columns\TextColumn::make('customer_name')
                    ->label('Nome do cliente')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total')
                    ->label('Total')
                    ->prefix('R$ ')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Efetuado em')
                    ->date('d/m/Y \à\s H:i')
                    ->searchable()
                    ->sortable(),
            ])
            ->defaultSort('id', 'desc')
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
            RelationManagers\ProductsRelationManager::class,
            RelationManagers\PaymentActionRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'edit' => Pages\EditOrder::route('/{record}/editar'),
        ];
    }
}
