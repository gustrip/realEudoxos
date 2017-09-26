<?php

namespace realEudoxos\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Gloudemans\Shoppingcart\Facades\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   Schema::defaultStringLength(191);
        view()->composer('frontend.layouts.topbar', function($view){

            $total_items = Cart::count();
            $total_price = Cart::total();

            $view->with(['total_items' => $total_items, 'total_price' => $total_price]);

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


}
