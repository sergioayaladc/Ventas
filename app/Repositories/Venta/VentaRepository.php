<?php

namespace App\Repositories\Venta;
use App\Repositories\Producto\ProductoInterface;
use App\Detalle;
use App\Venta;
use Illuminate\Http\Request;
class VentaRepository implements VentaInterface
{
    private $productoRepo;


    function __construct (ProductoInterface $productoRepo)
    {
        $this->productoRepo = $productoRepo;
    }

    public function listar ()
    {
        return Detalle::orderBy ('id','DESC')->paginate (10);
    }
    public function agregar_venta($request){

        $ventas = $request->all();
        $venta = Venta::create ($request->all ());
        //dd($ventas);
        foreach ($ventas['producto'] as $producto => $v){
            $producto_id = $ventas['producto']['id'];
            $producto_cantidad = $ventas['producto']['cantidad'];
            $contador_request = count ($producto_cantidad);
        }

        $detalle = new Detalle();
        $detalle->producto_id = $producto_id[0];
        $detalle->cantidad = $producto_cantidad[0];
        $detalle->venta_id = $venta->id;
        $detalle->cliente_id = $request->disponible;
        $producto = $this->productoRepo->buscar_producto ($producto_id[0]);
        $sumar_precio = $producto->precio * $producto_cantidad[0];
        $detalle->subtotal = $sumar_precio;
        $total_iva = ($request->iva_id) * ($detalle->subtotal);
        $venta->total = $total_iva + ($detalle->subtotal) -$request->descuento;

               //dd($contador_request);
            if($contador_request > 1) {
                for ($i = 0; $i < $contador_request; $i++){
                    $producto = $this->productoRepo->buscar_producto ($producto_id[$i]);
                    $sumar_precio = $producto->precio * $producto_cantidad[$i];
                    $detalle = new Detalle();
                    $detalle->venta_id = $venta->id;
                    $detalle->producto_id = $producto_id[$i];
                    $detalle->cantidad = $producto_cantidad[$i];
                    $detalle->cliente_id = $request->disponible;
                    $detalle->subtotal = $sumar_precio;
                    $total_iva = ($request->iva_id) * ($detalle->subtotal);
                    $venta->total = $total_iva + ($detalle->subtotal);
                    $detalle->save ();
                    //dump($detalle);
                    //dd($sumar);
                }
            }


        //dd($sumar_precio);
        $detalle->save ();
        //dd($venta);
        $venta->save ();

        return true;
    }

}