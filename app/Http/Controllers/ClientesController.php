<?php

namespace App\Http\Controllers;

use App\Repositories\Cliente\ClienteInterface;
use Illuminate\Http\Request;
use App\Cliente;

class ClientesController extends Controller
{
    private $clienteRepo;

    public function __construct (ClienteInterface $clienteRepo)
    {
        $this->clienteRepo = $clienteRepo;
        $this->middleware ('auth');
    }

    public function index ()
    {
        $clientes = $this->clienteRepo->listar ();

        return view ('clientes.index',compact ('clientes'))->with ('i',(request ()->input ('page',1) - 1) * 5);
    }

    public function create ()
    {
        return view ('clientes.create');
    }

    public function edit ($id)
    {
        $cliente = Cliente::findOrFail ($id);

        return view ('clientes.edit',compact ('cliente'));
    }

    public function update (Request $request,$id)
    {
        request ()->validate ([
            'nombre' => 'required',
            'estado' => 'required',

        ]);
        $cliente = Cliente::findOrFail ($id)->update ($request->all ());

        return redirect ()->route ('clientes.index',compact ('cliente'))->with ('success','Cliente se actualizo correctamente');
    }

    public function store (Request $request)
    {
        request ()->validate ([
            'nombre' => 'required',
            'estado' => 'required',
        ]);
        Cliente::create ($request->all ());

        return redirect ()->route ('clientes.index')->with ('success','El Cliente fue creado correctamente');
    }

    public function destroy ($id)
    {
        Cliente::findOrFail ($id)->delete ();

        return redirect ()->route ('clientes.index')->with ('success','El cliente se elimino correctamente');
    }
}