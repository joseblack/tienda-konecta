@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Productos') }}</div>

                <div class="card-body">
                    <div class="row justify-content-end">
                        <div class="col-md-6 d-flex justify-content-start">
                            <a class="btn btn-sm btn-outline-info btn-square mb-3" href="{{ route('productos.create') }}">
                                <i class="fa fa-fw fa-plus mr-1"></i> @lang('Create')
                            </a>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <form class="form-inline" action="{{ route('productos.index') }}">
                                <label for="name">Nombre:</label>
                                <input type="search" class="form-control" id="name" placeholder="Enter name" name="name">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search" id="search"></i>
                                </button>
                            </form>
                        </div>
                    </div>  
                    <table class="table table-hover table-vcenter table-striped table-sm">
                        <thead>
                            <tr>
                                <th style="text-transform: capitalize">Id</th>
                                <th style="text-transform: capitalize">nombre</th>
                                <th style="text-transform: capitalize">referencia</th>
                                <th style="text-transform: capitalize">precio</th>
                                <th style="text-transform: capitalize">peso</th>
                                <th style="text-transform: capitalize">categoria</th>
                                <th style="text-transform: capitalize">stock</th>
                                <th style="text-transform: capitalize">fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)
                            <tr>
                                <td>{{ $producto->id }}</td>
                                <td>{{ $producto->nombre }}</td>
                                <td>{{ $producto->referencia }}</td>
                                <td>{{ $producto->precio }}</td>
                                <td>{{ $producto->peso }}</td>
                                <td>{{ $producto->categoria }}</td>
                                <td>{{ $producto->stock }}</td>
                                <td>{{ $producto->created_at }}</td>
                                <td> 
                                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning btn-sm">                                       
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <a type="button" id="btn-trash" class="btn btn-danger btn-sm delete" data-toggle="modal"
                                       data-target="#exampleModal" data-attr="{{ route('productos.show', $producto->id) }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td> 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                 {{ $productos->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@include('productos.partials.modal-delete')
@endsection

@section('js_after')
<script src="{{ asset('js/users/userdelete.js') }}" defer></script>
@endsection
