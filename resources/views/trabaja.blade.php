@extends('layouts.main-layout')
@section('content-area')
    <main class="bg-white">
        <div class="trabajo container-fluid p-0">
            <div class="fondo-negro container-fluid">
                <section class="container text-center py-5">
                    <div class="row py-lg-5">
                        <div class="col-lg-6 col-md-8 mx-auto">
                            <h1 class="fw-light text-white">{{ $nombre }}</h1>
                        </div>
                        <p class="lead text-white fw-bold">
                            ¿Quieres unirte a nuestro equipo? <br>
                            Envíanos tu CV, a alguna de nuestras ofertas <br>
                            y estaremos encantados de contactar contigo.
                        </p>
                    </div>
                </section>
            </div>
        </div>
    </main>
    <div class="container-fluid bg-light">
        <div class="container">
            <div class="row py-5 justify-content-center">
                <div class="col-lg-8 col-md-12">
                    <form action="#" method="post" onsubmit="formularios(event)">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre*</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="tlfn" class="form-label">Teléfono*</label>
                            <input type="tel" class="form-control" name="tlfn" id="tlfn">
                        </div>
                        <div class="mb-3">
                            <label for="mensaje" class="form-label">Motivo</label>
                            <textarea class="form-control" rows="3" name="company" id="company"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="cv" class="form-label">CV</label>
                            <input type="file" class="form-control" name="cv" id="cv">
                        </div>
                        <div>
                            <input type="submit" value="Enviar" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('js')
        <script src="{{ asset('/js/script.js') }}"></script>
    @endsection
@endsection
