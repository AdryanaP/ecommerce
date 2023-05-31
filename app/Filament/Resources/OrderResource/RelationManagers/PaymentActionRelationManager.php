<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentActionRelationManager extends RelationManager
{
    protected static string $relationship = 'payment_action';

    protected static ?string $recordTitleAttribute = 'type';

    protected static ?string $modelLabel = 'Pagamento';

    protected static ?string $pluralModelLabel = 'Pagamentos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipo')
                    ->enum([
                        'card' => 'Cartão'
                    ]),
                Tables\Columns\TextColumn::make('amount')
                    ->label('Total')
                    ->prefix('R$ '),
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Situção')
                    ->colors([
                        'success' => 'aprovado e capturado'
                    ]),
                Tables\Columns\TextColumn::make('provider_id')
                    ->label('ID no Gateway')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
//                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
//                Tables\Actions\EditAction::make(),
//                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
//                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
