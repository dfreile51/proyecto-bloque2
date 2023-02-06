@extends('layouts.main-layout')
@section('content-area')
    <div class="container my-3 bg-white shadow">
        <div class="row text-center my-3">
            <h1 class="text-uppercase">Compra realizada con éxito</h1>
            <hr>
            <h2>
                <a href="{{ route('inicio') }}">Volver al inicio</a>
            </h2>
        </div>
    </div>
@endsection
