<?php

namespace App\Filament\Resources\SellerResource\Pages;

use App\Filament\Resources\SellerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSellers extends ManageRecords
{
    protected static string $resource = SellerResource::class;

    protected function getActions(): array
    {
        return [
        ];
    }
}
