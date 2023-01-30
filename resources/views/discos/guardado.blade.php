@extends('layouts.main-layout')
@section('content-area')
    <div class="container my-3 bg-white">
        <div class="row text-center">
            <h1>Disco {{ $operacion }}</h1>
            <hr>
            <h2>El disco "{{ $disco }}" se ha {{ $operacion }} correctamente</h2>
            <hr>
            <h2>
                <a href="{{ route('discos.index') }}">Volvel al inventario</a>
            </h2>
        </div>
    </div>
@endsection
