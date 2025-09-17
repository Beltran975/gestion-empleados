
<div class="modal-overlay" id="modal-edit-{{ $empleado->id_empleado }}">
    <div class="modal">
        <form action="{{ route('empleados.update', $empleado->id_empleado) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre', $empleado->nombre) }}" required>
            </div>
            <div class="form-group">
                <label>Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $empleado->fecha_nacimiento) }}" max="{{ date('Y-m-d') }}" required>
            </div>
            <div class="form-group">
                <label>CURP</label>
                <input type="text" name="curp" value="{{ old('curp', $empleado->curp) }}" maxlength="18" required>
            </div>
            <div class="form-group">
                <label>Domicilio</label>
                <input type="text" name="domicilio" value="{{ old('domicilio', $empleado->domicilio) }}" required>
            </div>
            <div class="form-group">
                <label>Salario</label>
                <input type="number" step="0.01" name="salario" value="{{ old('salario', $empleado->salario) }}" required>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-save">Guardar</button>
                <button type="button" class="btn btn-cancel" data-modal-close>Cancelar</button>
            </div>
        </form>
    </div>
</div>