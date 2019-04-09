<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
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
        $this->app->bind(
            'App\Repositories\Cliente\ClienteInterface',
            'App\Repositories\Cliente\ClienteRepository'
        );

        $this->app->bind(
            'App\Repositories\Producto\ProductoInterface',
            'App\Repositories\Producto\ProductoRepository'
        );
        $this->app->bind(
            'App\Repositories\Venta\VentaInterface',
            'App\Repositories\Venta\VentaRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
