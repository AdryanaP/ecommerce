<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationGroup = 'Minha loja';

    protected static ?string $modelLabel = 'Avalição';

    protected static ?string $pluralModelLabel = 'Avalições';

    protected static ?string $slug = 'avalicoes';

    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', "aguardando")->count();
    }

    protected static function getNavigationBadgeColor(): ?string
    {
        return 'success';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('name')->disabled()->label('Nome'),
                // Forms\Components\TextInput::make('email')->disabled()->label('email'),
                // Forms\Components\TextInput::make('product')->disabled()->label('produto'),
                // Forms\Components\TextInput::make('rating_number')->disabled()->numeric()->label('nota'),
                // Forms\Components\TextInput::make('comment')->disabled()->label('cometário'),
                Forms\Components\Select::make('status')->options([
                    'aprovado' => 'Aprovado',
                    'reprovado' => 'Reprovado',
                    'aguardando' => 'Aguardando aprovação'
                ])->required()->label('Status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->label('Cliente'),
                Tables\Columns\TextColumn::make('email')->searchable()->label('Email'),
                Tables\Columns\TextColumn::make('product')->searchable()->label('Id do produto'),
                Tables\Columns\BadgeColumn::make('rating_number')->searchable()->label('Avaliação'),
                Tables\Columns\TextColumn::make('comment')->searchable()->label('Comentário'),
                Tables\Columns\TextColumn::make('status')->searchable()->label('Status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Editar Status'),
                Tables\Actions\DeleteAction::make()->label('Deletar'),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListReviews::route('/'),
        ];
    }
}
