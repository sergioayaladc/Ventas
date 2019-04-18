<?php

namespace App\Http\Controllers;

use App\Detalle;
use App\Producto;
use App\Repositories\Venta\VentaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Repositories\Cliente\ClienteInterface;
use App\Repositories\Producto\ProductoInterface;
use DB;
use App\Venta;
use Carbon\Carbon;

class VentasController extends Controller
{
    private $productoRepo;

    private $clienteRepo;

    private $ventaRepo;

    public function __construct (ProductoInterface $productoRepo,ClienteInterface $clienteRepo, VentaRepository $ventaRepo)
    {
        $this->productoRepo = $productoRepo;
        $this->clienteRepo = $clienteRepo;
        $this->ventaRepo = $ventaRepo;
        $this->middleware ('auth');
    }

    public function index ()
    {
        return view ('ventas.index');
    }

    public function show ()
    {


    }

    public function create (Request $request)
    {
        $disponible = $this->clienteRepo->estado ();
        $stock = $this->productoRepo->stock ();
        $cantidad = $this->productoRepo->cantidad_numero ();
        $iva_id = $this->productoRepo->iva ();
        $precio = $this->productoRepo->precio ();

        return view ('ventas.create',compact ('disponible','stock','cantidad','iva_id','precio','total'));
    }

    public function store (Request $request)
    {
        //request ()->validate ([
        //    'descuento' => 'required',
        //    'cantidad' => 'required|min:0',
        //]);
        $resultado = $this->ventaRepo->agregar_venta ($request);

        if($resultado == true){
            return redirect ()->route ('ventas.index')->with ('success','La venta fue creada correctamente');
        }else{
            return redirect ()->route ('ventas.create')->with ('info','No tiene Stock suficiente');
        }
    }
}