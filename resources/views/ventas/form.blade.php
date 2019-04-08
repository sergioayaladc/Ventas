<table class="table">
    <tbody>
    <strong>Seleccione Cliente :</strong>
    {!! Form::select('disponible', $disponible ) !!}
    </tbody>
    <tbody>
    <strong>Seleccione Producto Disponible :</strong>
    {!! Form::select('stock', $stock ) !!}
    <strong>Seleccione Cantidad :</strong>
    {!! Form::input('cantidad', 'amount', $cantidad, ['class' => 'form-control']) !!}
    <strong>Seleccione IVA :</strong>
    <select name="select">

    </select>
    <strong>Seleccione Descuento :</strong>
    {!! Form::input('number', 'amount', null, ['class' => 'form-control']) !!}
    </tbody>

    {!! Form::submit('Guardar Venta',['class' => 'btn btn-primary']) !!}
</table>
        <div class="list-group">
            <a href="/clientes" class="list-group-item list-group-item-action active">Clientes</a>
            <a href="/productos" class="list-group-item list-group-item-action">Productos</a>
            <a href="#" class="list-group-item list-group-item-action">Ventas</a>
        </div>
    </div>
</div>