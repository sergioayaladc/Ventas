<?php
namespace App\Http\Controllers;
use App\Detalle;
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

    public function __construct(ProductoInterface $productoRepo,ClienteInterface $clienteRepo){
        $this->productoRepo = $productoRepo;
        $this->clienteRepo = $clienteRepo;
        $this->middleware('auth');
    }
    public function index()
    {
        return view('ventas.index');
    }
    public function show(){


    }

    public function create(){
        $disponible = $this->clienteRepo->estado ();
        $stock = $this->productoRepo->stock ();
        $cantidad = $this->productoRepo->cantidad_numero ();
        $iva_id = $this->productoRepo->iva ();
        return view('ventas.create',compact('disponible','stock','cantidad','iva_id','total'));
    }
    public function store(Request $request)
    {

        request()->validate([
            'descuento' => 'required'
        ]);

        Venta::create($request->all());
        $detalle = new Detalle();
        $detalle->venta_id = 4;
        $detalle->producto_id = 1;
        $detalle->cliente_id = $request->input('disponible');
        $detalle->cantidad = 1;
        $detalle->subtotal = 1;
        $detalle->created_at = Carbon::now();
        $detalle->updated_at = Carbon::now();
        $detalle->save ();

        return redirect()->route('ventas.index')
            ->with('success','La venta fue creada correctamente');
    }



}