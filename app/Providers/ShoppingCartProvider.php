<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ShoppingCart;
class ShoppingCartProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //creamos un view composer para inyectar la variable del carrito dentro de las vistas
        //con el * indicamos que queremos aplicar en todas las vistas
        view()->composer("*",function($view){
            $shopping_cart_id = \Session::get('shopping_cart_id');

            $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);

            \Session::put("shopping_cart_id", $shopping_cart->id);

            //enviamos la variable shopping_cart con el valor del carrito
            $view->with("shopping_cart",$shopping_cart);

        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
