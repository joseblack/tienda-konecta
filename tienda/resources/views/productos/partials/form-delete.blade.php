<!--form para eliminar--> 
<form action="{{ route('productos.destroy', $producto->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">¿Seguro deseas eliminar el registro {{ $producto->nombre }}?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger">Si, Eliminar</button>
    </div>
</form>