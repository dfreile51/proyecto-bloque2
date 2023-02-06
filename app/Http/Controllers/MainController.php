<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('inicio', 'contacto', 'trabaja');
    }

    public function inicio() {
        $consulta = "SELECT * FROM discos ORDER BY RAND() LIMIT 3";
        $discos = DB::select($consulta);
        return view('inicio')->with([
            'nombre' => 'Inicio',
            'discos' => $discos
        ]);
        // return view('inicio')->with(['nombre' => 'Inicio']);
    }

    public function contacto() {
        return view('contacto')->with(['nombre' => 'Contacto']);
    }

    public function trabaja() {
        return view('trabaja')->with(['nombre' => 'Trabaja con nosotros']);
    }
}
