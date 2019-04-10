<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Repositories\Producto\ProductoInterface;
use DB;
use App\Producto;

class ProductosController extends Controller
{
    private $productoRepo;

    public function __construct (ProductoInterface $productoRepo)
    {
        $this->productoRepo = $productoRepo;
        $this->middleware ('auth');
    }

    public function index ()
    {
        $productos = $this->productoRepo->listar ();

        return view ('productos.index',compact ('productos'))->with ('i',(request ()->input ('page',1) - 1) * 5);
    }

    public function create ()
    {
        return view ('productos.create');
    }

    public function store (Request $request)
    {
        request ()->validate ([
            'nombre' => 'required',
            'precio' => 'required',
            'cantidad' => 'required',
        ]);
        Producto::create ($request->all ());

        return redirect ()->route ('productos.index')->with ('success','El Producto fue creado correctamente');
    }

    public function destroy ()
    {


    }
}