<?php

namespace App\Repositories\Venta;

interface VentaInterface {
    public function listar();
    public function agregar_venta($agregar);
}