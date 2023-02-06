@extends('layouts.main-layout')
@section('content-area')
    <div class="container shadow my-3">
        <div class="row">
            <div class="col-xl-5 col-lg-12 p-0 text-center">
                <img src="{{ asset($disco->imagen) }}" alt="imagen" class="img-fluid">
            </div>
            <div class="col-xl-7 col-lg-12">
                <h1 class="text-center text-uppercase fw-bold fst-italic mt-5">{{ $disco->nombre }}</h1>
                <p class="text-center fst-italic fs-4 mb-5">{{ $disco->artista }}</p>
                <p class="fs-4 lh-lg mb-5">Formato: {{ $disco->formato }} <br> País: {{ $disco->pais }} <br> Género: {{ $disco->genero }} <br> Precio: {{ $disco->precio }}€</p>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="disco_id" value="{{ $disco->id }}">
                    <button type="submit" class="btn btn-success text-uppercase w-100 mb-3">Añadir al carrito</button>
                </form>
            </div>
        </div>
    </div>
@endsection
