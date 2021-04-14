<?php

namespace App\Providers;

use App\Repositories\ClientRepository;
use App\Repositories\Contracts\ClientRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\Services\ClientService;
use App\Services\Contracts\ClientServiceInterface;
use App\Services\Contracts\OrderServiceInterface;
use App\Services\Contracts\ProductServiceInterface;
use App\Services\OrderService;
use App\Services\ProductService;
use Illuminate\Support\ServiceProvider;

class PapelariaProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ClientServiceInterface::class,ClientService::class);
        $this->app->bind(ClientRepositoryInterface::class,ClientRepository::class);

        $this->app->bind(ProductServiceInterface::class,ProductService::class);
        $this->app->bind(ProductRepositoryInterface::class,ProductRepository::class);

        $this->app->bind(OrderServiceInterface::class,OrderService::class);
        $this->app->bind(OrderRepositoryInterface::class,OrderRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
