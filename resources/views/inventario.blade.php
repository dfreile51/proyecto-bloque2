@extends('layouts.main-layout')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.4.0/css/searchBuilder.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
@endsection
@section('content-area')
    <div class="container shadow my-3 bg-white">
        <div class="row">
            <div class="col-12 py-2">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (count($discos) > 0)
                    <table id="discos"
                        class='table table-striped table-bordered text-center align-middle dt-responsive nowrap'
                        style="width: 100%">
                        <thead>
                            <tr>
                                <th scope="col">IMAGEN</th>
                                <th scope="col">TITULO</th>
                                <th scope="col">ARTISTA</th>
                                <th scope="col">FORMATO</th>
                                <th scope="col">PAIS</th>
                                <th scope="col">PUBLICACIÓN</th>
                                <th scope="col">GÉNERO</th>
                                <th scope="col">PRECIO</th>
                                @if (Auth::check())
                                    <th scope="col">####</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($discos as $disco)
                                <tr>
                                    <td><img class="imagenes" src='{{ asset($disco->imagen) }}' alt='imagen' /></td>
                                    <td><b><i>{{ strtoupper($disco->nombre) }}</i></b></td>
                                    <td><i>{{ $disco->artista }}</i></td>
                                    <td>{{ $disco->formato }}</td>
                                    <td>{{ $disco->pais }}</td>
                                    <td>{{ $disco->fecha }}</td>
                                    <td>{{ $disco->genero }}</td>
                                    <td><b>{{ $disco->precio }}€</b></td>
                                    @if (Auth::check())
                                        <td>
                                            @if (Auth::user()->hasRole('admin'))
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('discos.show', ['disco' => $disco]) }}"
                                                        class="mx-1"><i class="fa-solid fa-magnifying-glass"
                                                            style="font-size: 23px;"></i></a>
                                                    <a href="{{ route('discos.edit', ['disco' => $disco]) }}"
                                                        class="mx-1"><i class="fa-solid fa-pen-to-square text-success"
                                                            style="font-size: 23px;"></i></a>
                                                    <form action="{{ route('discos.destroy', ['disco' => $disco]) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn p-0 mx-1" type="submit"><i
                                                                class="fa-solid fa-trash text-danger"
                                                                style="font-size: 23px;"></i></button>
                                                    </form>
                                                </div>
                                            @else
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('discos.show', ['disco' => $disco]) }}"
                                                        class="mx-1"><i class="fa-solid fa-magnifying-glass"
                                                            style="font-size: 23px;"></i></a>
                                                    <form action="{{ route('cart.add') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="disco_id" value="{{ $disco->id }}">
                                                        <button type="submit" class="btn border-0 p-0 mx-1"><i
                                                                class="fa-solid fa-cart-plus"
                                                                style="font-size: 23px;"></i></button>
                                                    </form>
                                                </div>
                                            @endif
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class='col-12 py-2 text-center'>
                        <h3 class="m-0">No hay discos</h3>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @section('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
        {{-- Resposive Datatable --}}
        <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap5.min.js"></script>
        {{-- Search Builder --}}
        <script src="https://cdn.datatables.net/searchbuilder/1.4.0/js/dataTables.searchBuilder.min.js"></script>
        <script src="https://cdn.datatables.net/searchbuilder/1.4.0/js/searchBuilder.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>
        <script>
            $(document).ready(function() {
                var table = $('#discos').DataTable({
                    "lengthMenu": [
                        [5, 10, 50, -1],
                        [5, 10, 50, 'ALL']
                    ],
                    searchBuilder: true
                });
                table.searchBuilder.container().prependTo(table.table().container());
            });
        </script>
    @endsection
@endsection
