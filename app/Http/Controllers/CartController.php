<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Marca;
use App\Producto;
use Cart;

class CartController extends Controller
{
    function add(Request $request){
        $producto = Producto::join('ofertas', 'ofertas.id', 'productos.oferta_id')
            ->where('productos.id', $request->producto_id)
            ->select('productos.*', 'ofertas.descuento')
            ->first();

        if ($request->cantidad > $producto->stock) {
            return back()->with(['mensaje'=>"stock no disponible", "tipo"=> "danger"]);
        }    

        $saleCondition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'SALE 5%',
            'type' => 'tax',
            'value' => '-'.$producto->descuento.'%',
        ));
    
        // now the product to be added on cart
        $product = array(
                    'id' => $producto->id,
                    'name' => $producto->nombre,
                    'price' => $producto->precio_venta,
                    'quantity' => $request->cantidad,
                    'attributes' => array(
                        'imagen' => $producto->imagen,
                        'descuento' => $producto->descuento,
                    ),
                    'conditions' => $saleCondition
                );
        
        // finally add the product on the cart
        Cart::add($product);
        // Cart::add(
        //     $producto->id,  
        //     $producto->nombre,  
        //     $producto->precio_venta, 
        //     1,
        //     array("imagen"=>$producto->imagen, "descuento"=>$producto->descuento),
           
        // );
        return back()->with(['mensaje'=>"$producto->nombre ¡se ha agregado con éxito al carrito!",
                            'tipo'=>'info']);
    }

    public function update(Request $request){
        $producto = Producto::find($request->producto_id);
        if($request->cantidad > $producto->stock){
            return back()->with(['mensaje'=>"stock no disponible", "tipo"=> "danger"]);
        }
        Cart::update($request->producto_id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->cantidad
            ),
        ));
        return back();
    }

    public function removeitem(Request $request) {
        Cart::remove([
        'id' => $request->id,
        ]);
        return back()->with(['mensaje'=>"Producto eliminado con éxito de su carrito.",
                                'tipo'=>'info']);
    }

    public function carrito(){
        $categorias = Categoria::all();
        $marcas = Marca::all();

        return view('paginas.carrito_compra', compact('categorias', 'marcas'));
    }

    public function check(){
        $categorias = Categoria::all();
        $marcas = Marca::all();

        return view('paginas.check', compact('categorias', 'marcas'));
    }
}
