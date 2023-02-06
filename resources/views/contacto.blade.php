@extends('layouts.main-layout')
@section('content-area')
    <main class="bg-white">
        <div class="contacto container-fluid p-0">
            <div class="fondo-negro container-fluid">
                <section class="container text-center py-5">
                    <div class="row py-lg-5">
                        <div class="col-lg-6 col-md-8 mx-auto">
                            <h1 class="fw-ligh text-white">{{ $nombre }}</h1>
                        </div>
                        <p class="lead text-white fw-bold">
                            ¿Tienes alguna duda? <br>
                            No te preocupes, rellena nuestro <br>
                            formulario para ponernos en contacto contigo. <br>
                        </p>
                    </div>
                </section>
            </div>
        </div>
    </main>
    <div class="container-fluid bg-light">
        <div class="container">
            <div class="row py-5">
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
                            <label for="company" class="form-label">Compañia/Organizacion*</label>
                            <input type="text" class="form-control" name="company" id="company">
                        </div>
                        <div class="mb-3">
                            <label for="mensaje" class="form-label">Mensaje*</label>
                            <textarea class="form-control" rows="3" name="company" id="company"></textarea>
                        </div>
                        <div>
                            <input type="submit" value="Enviar" class="btn btn-success">
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-md-12 mx-0 d-flex justify-content-center">
                    <div>
                        <h4 class="my-5">Datos de contacto</h4>
                        <p>C/ La inventada, 7, 3ºA</p>
                        <p>discomovida@gmail.com</p>
                        <p>Teléfono: 333666999</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('js')
        <script src="{{ asset('/js/script.js') }}"></script>
    @endsection
@endsection

