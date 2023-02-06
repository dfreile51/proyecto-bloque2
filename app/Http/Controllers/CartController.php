<?php

namespace App\Http\Controllers;

use App\Models\Disco;
use Illuminate\Http\Request;
use Cart;
use Darryldecode\Cart\Cart as CartCart;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add(Request $request)
    {

        $disco = Disco::find($request->disco_id);

        Cart::add(array(
            'id' => $disco->id,
            'name' => $disco->nombre,
            'price' => $disco->precio,
            'quantity' => 1,
            'attributes' => array(
                "urlfoto" => $disco->imagen
            )
        ));
        return back()->with('success', "$disco->nombre ¡se ha agregado con éxito al carrito!");
    }

    public function cart()
    {
        return view('cart.cart-checkout')->with([
            'nombre' => 'Carrito',
        ]);
    }

    public function removeitem(Request $request)
    {
        Cart::remove([
            'id' => $request->id,
        ]);
        return back()->with('success', "Disco eliminado con éxito de su carrito.");
    }

    public function update(Request $request)
    {
        Cart::update($request->id,
            array(
                "quantity" => array(
                    'relative' => false,
                    'value' => $request->quantity
                )
        ));

        return back()->with('success', "Disco agregado al carrito");
    }

    public function clear()
    {
        Cart::clear();
        return back()->with('success', "Carrito vaciado correctamente");
    }

    public function checkout()
    {
        Cart::clear();
        return view('cart.compras-realizadas')->with([
            'nombre' => 'Compra realizada'
        ]);
    }
}
