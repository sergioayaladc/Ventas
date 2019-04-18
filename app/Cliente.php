<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
class Cliente extends Model
{
    protected $table = 'clientes';

    protected $primarykey = 'id';

    protected $fillable = [
        'id',
        'nombre',
        'estado',
        'created_at',
        'updated_at'
    ];
    public function ventas(){
        return $this->hasMany(Venta::class);
    }
}