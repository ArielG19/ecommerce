<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;

class MainController extends Controller
{
    //
    public function home(){
    	// Esta funcionalidad la pasamos al provider para poder aplicarla en todas las vistas
    	//buscamos el id en la sesion
    	$shopping_cart_id = \Session::get('shopping_cart_id');

    	//cuando entremos a la pagina principal asignamos un carrito de compras
    	//mandamos un null porq aun no tenemos la sesion
    	$shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);

    	//despues de que obtenemos el carrito lo colocamos en las sessiones del servidor
    	//el metodo put no deja escribir una session
    	\Session::put("shopping_cart_id", $shopping_cart->id);

    	//pasamos el carrito de compras
    	return view('welcome',["shopping_cart" => $shopping_cart]);
    	
    }
    
}
