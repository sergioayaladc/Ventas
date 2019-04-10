<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Producto extends Model
{

    protected $table = 'productos';

    protected $primarykey = 'id';

    protected $fillable = [
        'id',
        'nombre',
        'precio',
        'cantidad',
        'created_at',
        'updated_at'
    ];
    public function  detalles(){
        return $this->hasMany(Detalle::class);
    }
}
