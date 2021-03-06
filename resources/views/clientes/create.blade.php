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
    {!! Form::open(array('route' => 'clientes.store','method'=>'POST')) !!}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Cliente</div>
                    <table class="table">
                        <thead>
                        <tr>
                            {!! Form::text('nombre', null, array('placeholder' => 'Nombres','class' => 'form-control', 'upper')) !!}
                            {!! Form::select('estado', array('0' => 'Inactivo', '1' => 'Activado'), '0'); !!}
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            {!! Form::close() !!}
                        </tr>
                        </thead>
                        <tbody>

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
                <a href="/clientes" class="list-group-item list-group-item-action active">Clientes</a>
                <a href="/productos" class="list-group-item list-group-item-action">Productos</a>
                <a href="#" class="list-group-item list-group-item-action">Ventas</a>
            </div>
        </div>
    </div>
@endsection