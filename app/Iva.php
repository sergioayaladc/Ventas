<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
class Iva extends Model
{
    protected $table = 'iva';

    protected $primarykey = 'id';

    protected $fillable = [
        'id',
        'IVA',
        'created_at',
        'updated_at'
    ];
    public function ventas(){
        return $this->hasMany(Venta::class,'id');
    }
}