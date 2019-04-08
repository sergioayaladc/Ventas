<?php

namespace App\Repositories\Cliente;

use App\Repositories\Cliente\ClienteInterface as ClienteInterface;
use App\Cliente;

class ClienteRepository implements ClienteInterface
{

    public function listar ()
    {
        return Cliente::orderBy ('id','DESC')->paginate (5);
    }

    public function estado ()
    {
        $clientes_estados = Cliente::where('estado','>',0)->get();
        $estado = ($clientes_estados->pluck('nombre'));
        return $estado;
    }
}