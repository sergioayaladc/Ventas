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
                    <div class="card-header">Detalle de la venta</div>
                    <table class="table">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                           <strong>ID de la venta:</strong>
                                                {{ $venta->id}}
                                        </div>
                                    </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>ID del detalle venta:</strong>
                                        {{ $detalle->id}}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Comprado por el Cliente:</strong>
                                        {{ $cliente->nombre}}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        @foreach ($productos as $producto)
                                            <strong>Producto:</strong>
                                            <option>
                                                {{$producto->nombre}}
                                            </option>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Cantidad:</strong>
                                        {{ $detalle->cantidad}}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Descuento:</strong>
                                        {{ number_format($venta->descuento)}}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Subtotal:</strong>
                                        {{ number_format($detalle->subtotal)}}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>IVA:</strong>
                                        {{ number_format($detalle->subtotal * $venta->iva_id)}}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Total:</strong>
                                        {{ number_format($venta->total)}}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Fecha:</strong>
                                        {{$detalle->created_at->format('d-m-y H:i:s')}}
                                    </div>
                                </div>
                            </tr>
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
            </div>
            <div class="list-group">
                <a href="/clientes" class="list-group-item list-group-item-action">Clientes</a>
                <a href="/productos" class="list-group-item list-group-item-action">Productos</a>
                <a href="/ventas" class="list-group-item list-group-item-action active">Ventas</a>
            </div>
        </div>
    </div>
@endsection