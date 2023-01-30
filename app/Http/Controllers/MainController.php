<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('inicio', 'contacto', 'trabaja');
    }

    public function inicio() {
        return view('inicio')->with(['nombre' => 'Inicio']);
    }

    public function contacto() {
        return view('contacto')->with(['nombre' => 'Contacto']);
    }

    public function trabaja() {
        return view('trabaja')->with(['nombre' => 'Trabaja con nosotros']);
    }
}
