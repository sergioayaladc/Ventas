<?php

namespace App\Repositories\Venta;

use App\Repositories\Venta\VentaInterface as VentaInterface;
use App\Detalle;

class VentaRepository implements VentaInterface
{

    public function listar ()
    {
        return Detalle::orderBy ('id','DESC')->paginate (10);
    }
}