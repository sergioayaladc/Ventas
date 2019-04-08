@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Listado de Clientes</div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clientes as $cliente)
                            <tr>
                                <td><a>{{$cliente->id}}</a> </td>
                                <td><a>{{$cliente->nombre}}</a> </td>
                                @if($cliente->estado === 0)
                                    <td>Inactivo</td>
                                @else
                                    <td>Activo</td>
                                @endif
                                <td>{!! Form::open(['method' => 'GET', 'route' => ['clientes.edit', $cliente->id]]) !!}
                                    {!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
                                    {!! Form::open(['method' => 'DELETE','route' => ['clientes.destroy', $cliente->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}</td>
                                </td>
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
                {{ $clientes->links() }}
                <a href="{{ route('clientes.create') }}" class="btn btn-success btn-lg btn-block">Agregar Cliente</a>
            </div>
            <div class="list-group">
                <a href="/clientes" class="list-group-item list-group-item-action active">Clientes</a>
                <a href="/productos" class="list-group-item list-group-item-action">Productos</a>
                <a href="/ventas" class="list-group-item list-group-item-action">Ventas</a>
            </div>
        </div>
    </div>
@endsection
