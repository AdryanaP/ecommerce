<?php

namespace App\Filament\Widgets;

use App\Models\Client;
use App\Models\Product;
use App\Models\Seller;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Clientes', Client::all()->count()),
            Card::make('Vendedores', Seller::all()->count()),
            Card::make('Produtos', Product::all()->count()),
        ];
    }
}
