<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    //
    protected $fillable = ['estado'];

    //creamos las relaciones para el carrito ---------------------------
    public function inShoppingCarts(){
		return $this->hasMany('App\InShoppingCart');
	}

	//para crear la relacion agregamos tambien la tabla pivot con la que esta relacionada
	public function products(){
		return $this->belongsToMany('App\Product','in_shopping_carts');
	}
	//fin de las relaciones para el carrito -----------------------------

    //metodo para saber cuentos productos hay en el carrito
	public function productSize(){
		//return $this->id;
		return $this->products()->count();
	}

    //creamos un metodo para buscar sesion o crearla
    //recibimos una sesion
    public static function findOrCreateBySessionID($shopping_cart_id){
    	//creamos la condicion para sabaer si shopping_cart existe
    	if($shopping_cart_id)
    		//si existe buscamo el carrito con el id correspondiente
    		return ShoppingCart::findBySession($shopping_cart_id);
    	
    	else
    		//si no existe, creamos uno
    		return ShoppingCart::createWithoutSession();
    	

    }
    //este metodo se encargara solo de buscar el carrito
    public static function findBySession($shopping_cart_id){
    	return ShoppingCart::find($shopping_cart_id);
    }

    //sino existe, creamos un carrito 
    public static function createWithoutSession(){
    	/*$shopping_cart = new shoppingcart;
    	$shopping_cart->estado = "incompleto"; //estado inicial del carrito de compra
    	$shopping_cart->save();
    	return $shopping_cart;*/
    	return ShoppingCart::create([
    		"estado" => "incompleto"
    	]);
    }
}
