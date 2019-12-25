@extends('tienda.plantilla')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Artículos en tienda</span>
                    </div>

                    <div class="card-body">      
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Precio por unidad</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            @if(session('mensaje'))
                                <?php
                                if(session('mensaje') == "Ya posee este artículo") {
                                    echo "<div class=\"alert alert-danger\" role=\"alert\">";
                                        echo session('mensaje');

                                        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                                <span aria-hidden=\"true\">&times;</span>
                                            </button>";

                                    echo "</div>";
                                } else {
                                    echo "<div class=\"alert alert-success\" role=\"alert\">";
                                        echo session('mensaje');

                                        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                                <span aria-hidden=\"true\">&times;</span>
                                            </button>";

                                    echo "</div>";
                                }
                                ?>
                            
                            @endif
                            <tbody>
                                @foreach ($articulos as $item)
                                <tr>
                                    <th scope="row">{{ $item->codArticulo }}</th>
                                    <td>{{ $item->nombre }}</td>
                                    <td>{{ $item->descripcion }}</td>
                                    <td>{{ $item->precioUnidad }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td>
                                        <a href="<?=route('tienda.edit', $item->codArticulo)?>" class="btn btn-primary btn-sm">Comprar</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$articulos->links()}}
                    {{-- fin card body --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection