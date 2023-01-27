<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function inicio() {
        return view('inicio')->with(['nombre' => 'Inicio']);
    }

    public function contacto() {
        return view('contacto')->with(['nombre' => 'Contacto']);
    }

    public function trabaja() {
        return view('trabaja')->with(['nombre' => 'Trabaja con nosotros']);
    }

    public function inventario() {
        return view('inventario')->with(['nombre' => 'Inventario']);
    }
}
