<?php

namespace App\Providers;

use App\Filament\Resources\CategoryResource;
use App\Filament\Resources\OrderResource;
use App\Filament\Resources\ProductResource;
use App\Models\Product;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
