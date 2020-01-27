<?php

namespace App\Http\Controllers;

use App\Carrito;
use App\Producto;
use Darryldecode\Cart\Exceptions\InvalidConditionException;
use Darryldecode\Cart\Exceptions\InvalidItemException;
use Darryldecode\Cart\Exceptions\UnknownModelException;
use Darryldecode\Cart\Helpers\Helpers;
use Darryldecode\Cart\Validators\CartItemValidator;
use Illuminate\Http\Request;

class CarroController extends Controller
{




    public function verCarro()
    {

      $productos = Producto::select()->get();

       return view('carrito',compact('productos'));
    }



    public function agregarAlCarro(Request $request){


       $id = $request['id'];
       $name = $request['producto'];
       $price = $request['precio'];
       $quantity = $request['cantidad'];



    	$userId = 10;
    	//ACá se deben colocar los datos de la tabla productos
       \Cart::session($userId)->add($id,$name,$price,$quantity);


     /*

         $items = \Cart::getContent();
         $getSubTotal= \Cart::session($userId)->getSubTotal();

		return view('formCarro',compact(['items', 'getSubTotal']));
       */
		return $this->formCarro();
  }



    public function formCarro(){

         $userId = 10;

  //   \Cart::clear();
  //   \Cart::session($userId)->clear();
         $getSubTotal=0;

    	 $items = \Cart::session($userId)->getContent();

    	 $getSubTotal= \Cart::session($userId)->getSubTotal();
       $productos = Producto::select()->get();

       $iva = $getSubTotal *0.19;
       $total = $getSubTotal + $iva;
    	return view('carrito',compact(['items','getSubTotal','productos','iva','total']));

    }


    public function borrarDelCarro(Request $request){

        $userId = 10;
        $getSubTotal=0;

        \Cart::session($userId)->remove($request['id']);

/*

        $items = \Cart::session($userId)->getContent();
    	 $getSubTotal= \Cart::session($userId)->getSubTotal();

    	return view('formCarro',compact(['items','getSubTotal']));

*/
    	return $this->formCarro();
    }






}




