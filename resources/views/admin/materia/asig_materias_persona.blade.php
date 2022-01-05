@extends("layouts.template_admin")

@section("contenido")
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">NOMBRE COMPLETO</label>
                        <input type="text" value="{{ $persona->paterno }} {{ $persona->materno }} {{ $persona->nombres }}" readonly class="form-control">
                        
                    </div>
                    <div class="col-md-4">
                    <label for="">CI</label>
                        <input type="text" value="{{ $persona->ci }}" readonly class="form-control">
                       
                    </div>
                    <div class="col-md-4">
                    <label for="">TELEFONO</label>
                        <input type="text" value="{{ $persona->telefono }}" readonly class="form-control">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5>Asignar Materias</h5>
                <form action="{{ route('asignar', $persona->id) }}" method="post">
                    @csrf
                    <label for="">Seleccionar Periodo</label>
                    <select name="periodo_id" id="" class="form-control">
                    @foreach ($perido as $p)
                    <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                        
                    @endforeach    
                    </select>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>SIGLA</th>
                            <th>ACCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carrera->materias as $materia)
                        <tr>
                            <td>{{ $materia->id }}</td>
                            <td>{{$materia->nombre}}</td>
                            <td>{{$materia->sigla}}</td>
                            <td>
                                <input type="checkbox" name="materias[]" value="{{ $materia->id }}">
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                    
                </table>
                <input type="submit" value="Asignar Materias" class="btn btn-info">
                </form>
                
            </div>
        </div>
    </div>
</div>

@endsection