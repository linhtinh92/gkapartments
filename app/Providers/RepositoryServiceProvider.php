<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\Eloquent\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SliderRepository::class, \App\Repositories\Eloquent\SliderRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BlogRepository::class, \App\Repositories\Eloquent\BlogRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ConfigRepository::class, \App\Repositories\Eloquent\ConfigRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BrandLogoRepository::class, \App\Repositories\Eloquent\BrandLogoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CategoryRepository::class, \App\Repositories\Eloquent\CategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductRepository::class, \App\Repositories\Eloquent\ProductRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductMetaRepository::class, \App\Repositories\Eloquent\ProductMetaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ContactRepository::class, \App\Repositories\Eloquent\ContactRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CartRepository::class, \App\Repositories\Eloquent\CartRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CheckoutRepository::class, \App\Repositories\Eloquent\CheckoutRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\LocationRepository::class, \App\Repositories\Eloquent\LocationRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ApartmentRepository::class, \App\Repositories\Eloquent\ApartmentRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ApartmentImgRepository::class, \App\Repositories\Eloquent\ApartmentImgRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RoomTypeRepository::class, \App\Repositories\Eloquent\RoomTypeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RoomTypeImgRepository::class, \App\Repositories\Eloquent\RoomTypeImgRepositoryEloquent::class);
        //:end-bindings:
    }
}
