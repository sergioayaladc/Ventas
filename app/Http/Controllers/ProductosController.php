<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Repositories\Producto\ProductoInterface;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class ProductosController extends Controller
{
    private $productoRepo;

    public function __construct(ProductoInterface $productoRepo){
        $this->productoRepo = $productoRepo;
        $this->middleware('auth');
    }
    public function index()
    {
        $productos = $this->productoRepo->listar ();
        return view('productos.index',compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }
    public function show(){


    }
    public function edit(){


    }
    public function destroy(){


    }


}