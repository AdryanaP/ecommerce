<?php

namespace App\Filament\Widgets;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Pedidos', Order::all()->count()),
            Card::make('Produtos', Product::all()->count()),
        ];
    }
}
