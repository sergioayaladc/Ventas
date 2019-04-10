<?php

namespace App\Repositories\Venta;

interface VentaInterface {
    public function listar();
    public function actualizar_producto($cantidad);
}