<?php

namespace App\Http\Controllers;

use App\Models\Disco;
use Illuminate\Http\Request;

class DiscoController extends Controller
{

    public function __construct() {
        $this->middleware(['auth','admin'])->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discos = Disco::all();
        return view('inventario')->with([
            'nombre' => 'Inventario',
            'discos' => $discos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discos.insertar-disco')->with([
            'nombre' => 'Insertar disco'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $disco = new Disco();

        $reglas = [
            'nombre' => 'required|max:50|unique:discos,nombre',
            'artista' => 'required',
            'formato' => 'required',
            'pais' => 'required',
            'fecha' => 'required',
            'genero' => 'required',
            'precio' => 'required|gte:0',
            'imagen' => 'required',
        ];
        $request->validate($reglas);

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $destinationPath = "images/discos/";
            $ruta = "../public/images/discos";
            $fileName = $file->getClientOriginalName();
            $rutaCompleta = $ruta . $fileName;
            if (!file_exists($rutaCompleta)) {
                $request->file('imagen')->move($destinationPath, $fileName);
            }
            $disco->imagen = $destinationPath . $fileName;
        }

        $disco->nombre = $request->nombre;
        $disco->artista = $request->artista;
        $disco->formato = $request->formato;
        $disco->pais = $request->pais;
        $disco->fecha = $request->fecha;
        $disco->genero = $request->genero;
        $disco->precio = $request->precio;
        $disco->save();

        return view('discos.guardado')->with([
            'nombre' => 'Disco guardado',
            'operacion' => 'insertado',
            'disco' => $request->nombre
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disco  $disco
     * @return \Illuminate\Http\Response
     */
    public function show(Disco $disco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disco  $disco
     * @return \Illuminate\Http\Response
     */
    public function edit(Disco $disco)
    {
        return view('discos.editar')->with([
            'nombre' => 'Editar disco',
            'disco' => $disco
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disco  $disco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disco $disco)
    {
        $reglas = [
            'nombre' => 'required|max:50|unique:discos,nombre,'.$disco->id,
            'artista' => 'required',
            'formato' => 'required',
            'pais' => 'required',
            'fecha' => 'required',
            'genero' => 'required',
            'precio' => 'required|gte:0',
            'imagen' => 'required',
        ];
        $request->validate($reglas);

        $discoEditado = Disco::find($disco->id);

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $destinationPath = "images/discos/";
            $ruta = "../public/images/discos";
            $fileName = $file->getClientOriginalName();
            $rutaCompleta = $ruta . $fileName;
            if (!file_exists($rutaCompleta)) {
                $request->file('imagen')->move($destinationPath, $fileName);
            }
            $discoEditado->imagen = $destinationPath . $fileName;
        }

        $discoEditado->nombre = $request->nombre;
        $discoEditado->artista = $request->artista;
        $discoEditado->formato = $request->formato;
        $discoEditado->pais = $request->pais;
        $discoEditado->fecha = $request->fecha;
        $discoEditado->genero = $request->genero;
        $discoEditado->precio = $request->precio;
        $discoEditado->save();

        return view('discos.guardado')->with([
            'nombre' => 'Disco actualizado',
            'operacion' => 'actualizado',
            'disco' => $discoEditado->nombre
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disco  $disco
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disco $disco)
    {
        $nombre = $disco->nombre;
        $disco->delete();
        return view('discos.guardado')->with([
            'nombre' => 'Disco eliminado',
            'operacion' => 'eliminado',
            'disco' => $nombre
        ]);
    }
}
