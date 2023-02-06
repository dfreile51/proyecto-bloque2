@extends('layouts.main-layout')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.4.0/css/searchBuilder.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
@endsection
@section('content-area')
    <div class="container my-3 bg-white shadow">
        <div class="row">
            <div class="col-12">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (count(Cart::getContent()))
                    <table id="carrito"
                        class='table table-striped table-bordered text-center align-middle dt-responsive nowrap'
                        style="width: 100%">
                        <thead>
                            <tr>
                                <th scope="col">IMAGEN</th>
                                <th scope="col">NOMBRE</th>
                                <th scope="col">CANTIDAD</th>
                                <th scope="col">PRECIO</th>
                                <th scope="col">SUB TOTAL</th>
                                <th scope="col">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::getContent() as $item)
                                <tr>
                                    <td><img class="imagenes" src="{{ asset($item->attributes->urlfoto) }}" alt="producto">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <form action="{{ route('cart.update') }}" method="POST">
                                            @csrf
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <input type="number" name="quantity" id="quantity"
                                                    class="form-control form-control-sm" value="{{ $item->quantity }}">
                                                <button type="submit" class="btn btn-success btn-sm"><i
                                                        class="fa fa-edit"></i></button>

                                        </form>
                                    </td>
                                    <td>{{ $item->price }}€</td>
                                    <td>{{ \Cart::get($item->id)->getPriceSum() }}€</td>
                                    <td>
                                        <form action="{{ route('cart.removeitem') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-danger">X</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        <table class="table table-stripped table-bordered my-2 " style="width: 300px">
                            <tr>
                                <th class="text-center">TOTAL</th>
                                <td colspan="2">{{ \Cart::getTotal() }}€</td>
                            </tr>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center py-2">
                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger me-1">Borrar Carrito</button>
                        </form>
                        <a href="{{ route('cart.checkout') }}" class="btn btn-success ms-1">Realizar compra</a>
                    </div>
                @else
                    <h2 class="text-center mt-2">Carrito vacio</h2>
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
            var table = $('#carrito').DataTable({
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
