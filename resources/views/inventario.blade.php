@extends('layouts.main-layout')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
@endsection
@section('content-area')
    <div class="container my-3 bg-white">
        <div class="row">
            <div class="col-lg-12 py-2">
                @if (count($discos) > 0)
                    <table id="discos" class='table table-striped table-bordered mt-3 display responsive nowrap' style="width: 100%">
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
                                    <td style="text-align: center"><img src='{{ asset($disco->imagen) }}' alt='imagen' /></td>
                                    <td class='pt-2'><b><i>{{ strtoupper($disco->nombre) }}</i></b></td>
                                    <td><i>{{ $disco->artista }}</i></td>
                                    <td>{{ $disco->formato }}</td>
                                    <td>{{ $disco->pais }}</td>
                                    <td>{{ $disco->fecha }}</td>
                                    <td>{{ $disco->genero }}</td>
                                    <td><b>{{ $disco->precio }}€</b></td>
                                    @if (Auth::check())
                                        <td>
                                            @if (Auth::user()->hasRole('admin'))
                                                <a href="{{ route('discos.edit', ['disco' => $disco]) }}"><i
                                                        class="fa-solid fa-pen-to-square text-success"
                                                        style="font-size: 23px;"></i></a>
                                                <form action="{{ route('discos.destroy', ['disco' => $disco]) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="eliminar" type="submit"><i class="fa-solid fa-trash text-danger" style="font-size: 23px;"></i></button>
                                                </form>
                                                {{-- <a href="#deleteModal{{ $disco->id }}" data-bs-toggle="modal"></a> --}}
                                            @endif
                                        </td>
                                    @endif
                                </tr>
                                @include('discos.modals.modal-delete')
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
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#discos').DataTable({
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, 'ALL']
                ],
                responsive: true
            });
        });
    </script>
@endsection
@endsection
