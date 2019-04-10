<?php

namespace App\Repositories\Venta;

use App\Repositories\Venta\VentaInterface as VentaInterface;
use App\Detalle;
use App\Producto;

class VentaRepository implements VentaInterface
{

    public function listar ()
    {
        return Detalle::orderBy ('id','DESC')->paginate (10);
    }

    public function actualizar_producto($cantidad){

        $actualizacion = Producto::find($cantidad);
        return $actualizacion;
    }
}