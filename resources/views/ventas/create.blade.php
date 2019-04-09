@extends('layouts.app')
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Ooops!</strong> Hubo algunos problemas.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(array('route' => 'ventas.store','method'=>'POST')) !!}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Venta</div>
                    <table class="table">
                        <tbody>
                        <strong>Seleccione Cliente :</strong>
                        {!! Form::select('disponible', $disponible ) !!}
                        </tbody>
                        <tbody>
                        <strong>Seleccione Producto Disponible :</strong>
                        {!! Form::select('stock', $stock ) !!}
                        <strong>Seleccione Cantidad :</strong>
                        {!! Form::input('cantidad', 'cantidad', $cantidad, ['class' => 'form-control']) !!}
                        <strong>Seleccione IVA :</strong>
                            {!! Form::select('iva_id', $iva_id) !!}
                        <strong>Seleccione Descuento :</strong>
                        {!! Form::number('descuento', null, array('placeholder' => 'Es Obligatorio','class' => 'form-control', 'upper')) !!}
                        </tbody>
                        {!! Form::number('total', null, array('placeholder' => 'Es Obligatorio','class' => 'form-control', 'upper')) !!}
                        {!! Form::submit('Guardar Venta',['class' => 'btn btn-primary']) !!}
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