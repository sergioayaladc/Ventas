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
    @if (Session::has('info'))
        <div class="alert alert-info">{{ Session::get('info') }}</div>
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
                        <select name="disponible">
                        @foreach ($disponible as $disponibles)
                            <option value="{{$disponibles->id}}">
                                {{$disponibles->nombre}}
                            </option>
                        @endforeach
                        </select>
                        </tbody>
                        <tbody>
                        <strong>Seleccione Producto Disponible :</strong>
                        <select name="producto[id][]">
                            @foreach ($stock as $stocks)
                                <option value="{{$stocks->id}}">
                                    {{$stocks->nombre}}
                                </option>
                            @endforeach
                        </select>
                        <strong>Seleccione Cantidad :</strong>
                        <input type="number" name="producto[cantidad][]">
                        <strong>Seleccione IVA :</strong>
                        <select name="iva_id">
                        @foreach ($iva_id as $ivas)
                            <option value="{{$ivas->iva}}">
                                {{$ivas->iva}}
                            </option>
                        @endforeach
                        </select>
                        <strong>Seleccione Descuento :</strong>
                        <input type="number" name="descuento">
                        </tbody>
                        <form id="form" name="form" method="post">
                            <a href="#" onclick="AgregarCampos();">Agregar Otro Producto</a>
                            <div id="campos">
                            </div>
                        </form>
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
<script type="text/javascript">
   function AgregarCampos() {
       campo =
           '<li class="saved">' +
                '<input type="number" name="producto[\cantidad\][]">'+
                '<select name="producto[\id\][]">';
                @foreach ($stock as $stocks)
                    console.log({{$stocks->id}});
                    campo += '<option value="' + {{$stocks->id}} + '">' + "{{$stocks->nombre}}" + '</option>';
                @endforeach
       campo +=  '</select>'+
           '</li>';
       $("#campos").append(campo);
    }
</script>
