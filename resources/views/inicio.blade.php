@extends('layouts.main-layout')
@section('content-area')
    <main class=" bg-white">
        <div class="inicio container-fluid p-0">
            <div class="fondo-negro container-fluid">
                <section class="container text-center py-5">
                    <div class="row py-lg-5">
                        <div class="col-lg-6 col-md-8 mx-auto">
                            <h1 class="fw-ligh text-white text-uppercase">Disco movida</h1>
                        </div>
                        <p class="lead text-white fw-bold">
                            La mayor base de datos de discos de música de la actualidad!!!
                        </p>
                    </div>
                </section>
            </div>
        </div>
        <div class="album py-5 bg-light">
            <div class="container">
                <h1 class="text-center mb-5 text-uppercase fw-bold fst-italic">Discos recomendados</h1>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach ($discos as $disco)
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src='{{ asset($disco->imagen) }}' alt='imagen' />
                                <div class="card-body">
                                    <h1 class="text-uppercase fw-bold fst-italic">{{ $disco->nombre }}</h1>
                                    <p class="fs-5 fw-semibold fst-italic">{{ $disco->artista }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
