@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        Has iniciado sesión! - {{ Auth::user()->name }}
                </div>
            </div>
        </div>
        <div class="list-group">
            <a href="/clientes" class="list-group-item list-group-item-action">Clientes</a>
            <a href="/productos" class="list-group-item list-group-item-action">Productos</a>
            <a href="/ventas" class="list-group-item list-group-item-action">Ventas</a>
        </div>
    </div>
</div>
@endsection
