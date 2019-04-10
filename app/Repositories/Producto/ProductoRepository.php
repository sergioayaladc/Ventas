<?php

namespace App\Repositories\Producto;

use App\Repositories\Producto\ProductoInterface as ProductoInterface;
use App\Producto;
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
        $stock = ($listado_stock->pluck('nombre','id'));
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
        $iva = ($obtener_iva->pluck('iva','iva'));
        return $iva;
    }
    public function precio ()
    {
        $listado_stock = Producto::where('cantidad','>',0)->get();
        $stock = ($listado_stock->pluck('nombre','precio'));
        return $stock;
    }

}