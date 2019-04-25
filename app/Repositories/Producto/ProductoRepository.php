<?php

namespace App\Repositories\Producto;

use App\Repositories\Producto\ProductoInterface as ProductoInterface;
use App\Producto;
use App\Venta;
use App\Detalle;
use App\Iva;

class ProductoRepository implements ProductoInterface
{

    public function listar ()
    {
        return Producto::orderBy ('cantidad','DESC')->paginate (10);
    }
    public function stock ()
    {
        $listado_stock = Producto::where('cantidad','>',0)->get();
        $stock = ($listado_stock);
        return $stock;
    }



    public function cantidad_numero ()
    {
        $listado_stock = Producto::where('cantidad','>',0)->get();
        $stock = ($listado_stock->pluck('cantidad','id')->first());
        return $stock;
    }
    public function iva(){
        $obtener_iva = Iva::all();
        $iva = ($obtener_iva);
        return $iva;
    }
    public function precio ()
    {
        $listado_stock = Producto::where('cantidad','>',0)->get();
        $stock = ($listado_stock->pluck('nombre','precio'));
        return $stock;
    }

    public function buscar_producto($request){
        $producto = Producto::find ($request);
        return $producto;
    }
    public function detalle_producto($request){
        $detalle_producto = Detalle::where('venta_id',$request)->get();
        $detalle_producto->pluck('id','cantidad','subtotal');
        //dd($detalle_producto);
        return $detalle_producto;
    }
    public function sumar_producto($request){
        $detalle_producto = Detalle::where('cantidad',$request)->get();
        $detalle_producto->pluck('cantidad');
        //dd($detalle_producto);
        return $detalle_producto;
    }
}