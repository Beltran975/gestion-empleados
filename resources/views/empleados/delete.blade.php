
<div class="modal-overlay" id="modal-delete-{{ $empleado->id_empleado }}">
    <div class="modal modal-confirm">
        <p>
            ¿Estás seguro de eliminar a <strong>{{ $empleado->nombre }}</strong> y toda su información registrada?
        </p>
        <div class="btn-group">
            <form action="{{ route('empleados.destroy', $empleado->id_empleado) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-delete-confirm">Eliminar</button>
            </form>
            <button type="button" class="btn btn-cancel" data-modal-close>Cancelar</button>
        </div>
    </div>
</div>