<?php

namespace App\Http\Controllers;

use App\Detalle;
use App\Producto;
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

    public function __construct (ProductoInterface $productoRepo,ClienteInterface $clienteRepo)
    {
        $this->productoRepo = $productoRepo;
        $this->clienteRepo = $clienteRepo;
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
        //dd($request->all());
        request ()->validate ([
            'descuento' => 'required',
            'cantidad' => 'required|min:0',
        ]);
        $venta = Venta::create ($request->all ());
        $producto = Producto::find ($request->stock);
        $cantidad_producto = $producto->cantidad;
        $detalle = new Detalle();
        $detalle->venta_id = $venta->id;
        $detalle->producto_id = $request->stock;
        $detalle->cliente_id = $request->disponible;
        $detalle->cantidad = $request->cantidad;
        if($cantidad_producto >= $detalle->cantidad) {
            $producto->decrement ('cantidad',$detalle->cantidad);
        } else {
            return redirect ()->route ('ventas.create')->with ('info','No tiene Stock suficiente');
        }
        $detalle->subtotal = $producto->precio * $detalle->cantidad - $request->descuento;
        $total_iva =  ($request->iva_id) * ($detalle->subtotal);
        $detalle->created_at = Carbon::now ();
        $detalle->updated_at = Carbon::now ();
        $venta->total = $total_iva + ($detalle->subtotal);
        $venta->save();
        $detalle->save ();

        return redirect ()->route ('ventas.index')->with ('success','La venta fue creada correctamente');
    }
}