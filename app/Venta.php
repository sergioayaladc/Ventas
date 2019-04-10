<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
class Venta extends Model
{
    protected $table = 'ventas';

    protected $primarykey = 'id';

    protected $fillable = [
        'id',
        'fecha',
        'iva_id',
        'descuento',
        'total',
        'estado',
        'created_at',
        'updated_at'
    ];

    public function iva(){
        return $this->belongsTo(Iva::class);
    }
    public function  detalles(){
        return $this->belongsTo(Detalle::class);
    }
    public function productos(){
        return $this->belongsTo(Producto::class);
    }
    public function clientes(){
        return $this->belongsTo(Cliente::class);
    }
}