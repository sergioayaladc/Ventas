<?php

namespace App\Repositories\Producto;

interface ProductoInterface {
    public function listar();
    public function stock();
    public function cantidad_numero();
    public function iva();
    public function precio();
    public function buscar_producto($request);
    public function detalle_producto($request);
    public function sumar_producto($request);
}