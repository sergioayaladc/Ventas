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
                    <div class="card-header">Listado de Ventas en Detalle</div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Operación</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($detalles as $detalle)
                            <tr>
                                <td><a>{{$detalle->id}}</a> </td>
                                <td><a>{{$detalle->created_at->format('d-m-Y')}}</a></td>
                                <td>{!! Form::open(['method' => 'GET', 'route' => ['detalles.show', $detalle->id]]) !!}
                                    {!! Form::submit('Ver',['class' => 'btn btn-primary']) !!}
                                    {!! Form::open(['method' => 'DELETE','route' => ['detalles.destroy', $detalle->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}</td>
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
                {{ $detalles->links() }}
            </div>
            <div class="list-group">
                <a href="/clientes" class="list-group-item list-group-item-action">Clientes</a>
                <a href="/productos" class="list-group-item list-group-item-action">Productos</a>
                <a href="/ventas" class="list-group-item list-group-item-action active">Ventas</a>
            </div>
        </div>
    </div>
@endsection
