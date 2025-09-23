<div class="modal-overlay" id="modal-create">
    <div class="modal">
        @if($errors->any())
            <div class="modal-errors">
                <strong>Por favor corrige los errores:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('empleados.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" required>
            </div>
            <div class="form-group">
                <label>Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" max="{{ date('Y-m-d') }}" required>
            </div>
            <div class="form-group">
                <label>CURP</label>
                <input type="text" name="curp" value="{{ old('curp') }}" maxlength="18" required>
                @error('curp')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Domicilio</label>
                <input type="text" name="domicilio" value="{{ old('domicilio') }}" required>
            </div>
            <div class="form-group">
                <label>Teléfono</label>
                <input type="tel" name="telefono" value="{{ old('telefono') }}" required>
            </div>
            <div class="form-group">
                <label>Salario</label>
                <input type="number" step="0.01" name="salario" value="{{ old('salario') }}" required>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-save">Agregar empleado</button>
                <button type="button" class="btn btn-cancel" data-modal-close>Cancelar</button>
            </div>
        </form>
    </div>
</div>