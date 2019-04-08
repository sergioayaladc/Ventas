<?php

namespace App\Repositories\Producto;

use App\Repositories\Producto\ProductoInterface as ProductoInterface;
use App\Producto;
use App\Iva;

class ProductoRepository implements ProductoInterface
{

    public function listar ()
    {
        return Producto::orderBy ('cantidad','DESC')->paginate (5);
    }
    public function stock ()
    {
        $listado_stock = Producto::where('cantidad','>',0)->get();
        $stock = ($listado_stock->pluck('nombre'));
        return $stock;
    }
    public function cantidad_numero ()
    {
        $listado_stock = Producto::where('cantidad','>',0)->get();
        $stock = ($listado_stock->pluck('cantidad')->first());
        return $stock;
    }
    public function iva(){
        $obtener_iva = Iva::all();
        $iva = ($obtener_iva->pluck('iva'));
        return $iva;
    }
    public function precio(){
        $listado_precio = Producto::all();
        $precio = ($listado_precio->pluck('precio')->first());
        return $precio;
    }
    public function suma_iva(){
        $obtener_iva = Iva::all();
        $iva = ($obtener_iva->pluck('iva'));
        $listado_stock = Producto::where('cantidad','>',0)->get();
        $stock = ($listado_stock->pluck('cantidad')->first());

        return $total = 0.19 * 100;
    }
}