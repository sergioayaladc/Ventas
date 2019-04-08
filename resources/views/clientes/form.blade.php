<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre :</strong>
                {!! Form::text('nombre', null, array('placeholder' => 'Nombre Completo','maxlength' <= 20,'class' => 'form-control', 'upper')) !!}
                <strong>Estado :</strong>
                <br>
                {!! Form::select('estado',['Inactivo','Activo'],[$cliente->estado]) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</div>