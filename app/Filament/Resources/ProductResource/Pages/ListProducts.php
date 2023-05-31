<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Artisan;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getActions(): array
    {
        return [
            Actions\Action::make('Sincronizar imagens')->action('syncImagesWithBling'),
            Actions\Action::make('Sincronizar com o Bling')->action('syncWithBling'),
        ];
    }

    public function syncWithBling(): void
    {
        Artisan::call('bling:sync-products');
    }

    public function syncImagesWithBling(): void
    {
        Artisan::call('products:organize-images');
    }
}
