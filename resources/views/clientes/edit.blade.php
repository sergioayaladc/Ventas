@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Cliente</div>
                    <table class="table">
                        <thead>
                        <tr>
                            {!! Form::model($cliente, ['method' => 'PATCH','route' => ['clientes.update', $cliente->id]]) !!}
                            @include('clientes.form')
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