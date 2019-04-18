<?php

namespace App\Http\Controllers;

use App\Detalle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Repositories\Cliente\ClienteInterface;
use App\Repositories\Producto\ProductoInterface;
use App\Repositories\Venta\VentaInterface;
use DB;
use App\Producto;
use App\Cliente;
use App\Venta;

class DetallesController extends Controller
{
    private $productoRepo;

    private $clienteRepo;

    private $detalleRepo;

    public function __construct (
        ProductoInterface $productoRepo,
        ClienteInterface $clienteRepo,
        VentaInterface $detalleRepo
    ) {
        $this->productoRepo = $productoRepo;
        $this->clienteRepo = $clienteRepo;
        $this->detalleRepo = $detalleRepo;
        $this->middleware ('auth');
    }

    public function index ()
    {
        $detalles = $this->detalleRepo->listar ();

        return view ('detalles.index',compact ('detalles'))->with ('i',(request ()->input ('page',1) - 1) * 5);
    }

    public function show ($id)
    {
        $detalle = Detalle::findOrFail ($id);
        $venta = Venta::where ('id',$detalle->venta_id)->first ();
        $cliente = Cliente::where ('id',$detalle->cliente_id)->first ();
        $producto = Producto::where ('id',$detalle->producto_id)->first ();
        $productos = Producto::all();

        return view ('detalles.show',compact ('detalle','cliente','producto','venta','productos'));
    }
}