@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">                  
                    <nav class="navbar navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">
                                Mis artículos
                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                            <a href="<?=route('tienda.index')?>" class="btn btn-primary btn-sm left">Tienda</a>
                            </ul>
                        </div>
                    </nav>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Precio por unidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articulos as $item)
                                <tr>
                                    <td>{{ $item->nombre }}</td>
                                    <td>{{ $item->descripcion }}</td>
                                    <td>{{ $item->precioUnidad }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div> 

<!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Proyecto 2
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        aasa
                    </ul>

                    <ul class="navbar-nav ml-auto">
                    <a href="" class="btn btn-primary left">Comprar</a>
                    </ul>
                </div>
            </div>
        </nav> -->

@endsection
