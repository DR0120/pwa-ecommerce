<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Producto;
use App\DetallePedido;
use App\Categoria;
use App\Marca;
use Cart;
use DB;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        $marcas = Marca::all();

        $pedidos = Pedido::where('persona_id', Auth::id())
            ->get();

        return view('paginas.detalle_usuario', compact('categorias', 'marcas', 'pedidos'));
    }

    public function show($id){
        $detalles = DetallePedido::where('pedido_id', $id)
            ->get();

        $categorias = Categoria::all();
        $marcas = Marca::all();
        return view('paginas.detalle_pedido', compact('categorias', 'marcas', 'detalles'));
    }

    public function store(Request $request){
        $nro_pedido = mt_rand(1000,9999);
        try{

            DB::beginTransaction();

            $pedido = new Pedido();
            $pedido->id = $nro_pedido;
            $pedido->persona_id = \Auth::user()->id;
            $pedido->nro_pedido = $nro_pedido;
            $pedido->estado = 'registrado';
            $pedido->total_pagar = Cart::getSubTotal();
            $pedido->direccion = $request->direccion;
            $pedido->calle=$request->calle;
            $pedido->nro_casa = $request->nro_casa;
            $pedido->ubicacion_lat = $request->lat;
            $pedido->ubicacion_lon = $request->lon;
            $pedido->save();
            

             foreach(Cart::getContent() as $producto){
                 $descuento = $producto->attributes->descuento;
                $detalle = new DetallePedido();
                /*enviamos valores a las propiedades del objeto detalle*/
                /*al idcompra del objeto detalle le envio el id del objeto venta, que es el objeto que se ingresó en la tabla ventas de la bd*/
                /*el id es del registro de la venta*/
                $detalle->pedido_id = $nro_pedido;
                $detalle->producto_nombre = $producto->name;
                $detalle->cantidad = $producto->quantity;

                $product = Producto::find($producto->id);
                $product->stock = $product->stock - $producto->quantity;
                $product->save();

                $detalle->precio = $producto->price;
                $detalle->descuento = $descuento;           
                $detalle->save();
            }
                
            DB::commit();
            Cart::clear();

        } catch(Exception $e){
            
            DB::rollBack();
        }
        $categorias = Categoria::all();
        $marcas = Marca::all();

        return view('paginas.compra_finalizada', compact('categorias', 'marcas'));
    }
}
