@extends("layouts.template_admin")

@section("titulo", "Nueva Persona")

@section("contenido")

<form action="{{ route('persona.store') }}" method="post">
 @csrf
<div class="row">
    <div class="col-md-8">
        <div class="card">
      
            <div class="card-body">
                    <label for="">Ingrese Nombre</label>
                    <input type="text" name="nombres" class="form-control @error('nombres') is-invalid @enderror" value="{{ old('nombres') }}">
                    @error('nombres')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="">Ingrese Ap. Paterno</label>
                    <input type="text" name="paterno" class="form-control" value="{{ old('paterno') }}">
                
                    <label for="">Ingrese Ap. Materno</label>
                    <input type="text" name="materno" class="form-control" value="{{ old('materno') }}">
                    <label for="">Ingrese CI:</label>
                    <input type="text" name="ci" class="form-control @error('ci') is-invalid @enderror" value="{{ old('ci') }}">
                    @error('ci')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="">Ingrese Dirección</label>
                    <input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}">
                    <label for="">Ingrese Telefono</label>
                    <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}">
                
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary btn-block">Guardar Persona</button>
                <button type="reset" class="btn btn-secondary btn-block">Limpiar Datos</button>
            </div>
        </div>
    </div>
    
</div>
</form>

@endsection