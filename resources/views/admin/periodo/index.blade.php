@extends("layouts.template_admin")

@section("titulo", "Gestión Periodo")

@section("contenido")

<div class="row">
    <div class="col-md-12">
        <!-- Button trigger modal -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Nuevo Periodo
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('periodo.store') }}" method="post">
          @csrf
      <div class="modal-body">
          <label for="">Ingrese Nombre:</label>
          <input type="text" name="nombre" class="form-control">
          <label for="">Ingrese duracion:</label>
          <input type="text" name="duracion" class="form-control">
          <label for="">Ingrese gestion:</label>
          <input type="text" name="gestion" class="form-control">
          <label for="">Ingrese Descripción:</label>
          <input type="text" name="descripcion" class="form-control">
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Guardar Periodo</button>
      </div>
    </div>
  </div>
</div>

        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>nombre</th>
                            <th>duracion</th>
                            <th>gestion</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lista_periodos as $periodo)
                        <tr>
                            <td>{{ $periodo->id }}</td>
                            <td>{{ $periodo->nombre }}</td>
                            <td>{{ $periodo->duracion }}</td>
                            <td>{{ $periodo->gestion }}</td>
                        </tr>                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection