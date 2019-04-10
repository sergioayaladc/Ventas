@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Listado de Productos</div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productos as $producto)
                            <tr>
                                <td><a>{{$producto->id}}</a> </td>
                                <td><a>{{$producto->nombre}}</a> </td>
                                <td><a>{{number_format($producto->precio)}}</a> </td>
                                <td><a>{{number_format($producto->cantidad)}}</a> </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
                <a href="{{ route('productos.create') }}" class="btn btn-success btn-lg btn-block">Agregar Producto</a>            </div>
            <div class="list-group">
                <a href="/clientes" class="list-group-item list-group-item-action">Clientes</a>
                <a href="/productos" class="list-group-item list-group-item-action active">Productos</a>
                <a href="/ventas" class="list-group-item list-group-item-action">Ventas</a>
            </div>
        </div>
    </div>
@endsection
