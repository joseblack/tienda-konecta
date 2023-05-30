@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <form method="POST" action="{{ route('ventas.store') }}">
                    @csrf
                    
                    <div class="form-group row">
                        <label for="rol" class="col-md-4 col-form-label text-md-right">{{ __('Producto') }}</label>

                        <div class="col-md-6">
                            <select id="producto_id" name="producto_id" class="form-control">
                                <option selected value="">Choose...</option>
                                @foreach ($productos as $producto)
                                  <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                @endforeach
                                <option>...</option>
                            </select>
                            @error('producto_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cantidad" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad') }}</label>

                        <div class="col-md-6">
                            <input id="cantidad" type="number" class="form-control @error('cantidad') is-invalid @enderror" name="cantidad" required autocomplete="new-cantidad">

                            @error('cantidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                    
                </form>
                <div class="card-header">{{ __('Ventas') }} </div>

                <table class="table table-hover table-vcenter table-striped table-sm">
                    <thead>
                        <tr>
                            <th style="text-transform: capitalize">Id</th>
                            <th style="text-transform: capitalize">Producto</th>
                            <th style="text-transform: capitalize">Cantidad</th>
                            <th style="text-transform: capitalize">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ventas as $venta)
                        <tr>
                            <td>{{ $ventas[$loop->index]->id }}</td>
                            <td>{{ $ventas[$loop->index ]->nombre }}</td>
                            <td>{{ $ventas[$loop->index]->cantidad }}</td>
                            <td>{{ $ventas[$loop->index]->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('productos.partials.modal-delete')
@endsection

@section('js_after')
<script src="{{ asset('js/users/userdelete.js') }}" defer></script>
@endsection
