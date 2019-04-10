<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

use DB;
class Detalle extends Model
{
    protected $table = 'detalles';

    protected $primarykey = 'id';

    protected $fillable = [
        'id',
        'venta_id',
        'producto_id',
        'cliente_id',
        'cantidad',
        'subtotal',
        'created_at',
        'updated_at'
    ];
    public function ventas(){
        return $this->hasMany(Venta::class);
    }
    public function productos(){
        return $this->belongsTo(Producto::class);
    }
    public function clientes(){
        return $this->belongsTo(Cliente::class);
    }
}