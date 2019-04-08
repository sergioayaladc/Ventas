<?php

namespace App\Repositories\Producto;

interface ProductoInterface {
    public function listar();
    public function stock();
    public function cantidad_numero();
    public function iva();
    public function precio();
    public function suma_iva();
}