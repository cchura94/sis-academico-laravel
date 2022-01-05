@extends("layouts.template_admin")

@section("titulo", "Listado de Personas")

@section("css")
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section("js")
<!-- DataTables  & Plugins -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", {
          extend: "excel",
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: "pdf",
          exportOptions: {
            columns: ':visible'
          }
        }, "print", "colvis"
      ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection

@section("contenido")
@auth
<div class="row">
  <div class="col-md-12">
    <div class="card">




      @if (session('mensaje'))
      <div class="alert alert-success">
        {{ session('mensaje') }}
      </div>
      @endif
      <div class="card-body">
        <a href="{{ route('persona.create') }}" class="btn btn-primary">Nueva Persona</a>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>CI</th>
              <th>NOMBRE COMPLETO</th>
              <th>DIRECCION</th>
              <th>TELEFONO</th>
              <th>USUARIO</th>
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($lista_personas as $per)
            <tr>
              <td>{{ $per->ci }}</td>
              <td>{{ $per->nombres }} {{ $per->paterno }} {{ $per->materno }}</td>
              <td>{{ $per->direccion }}</td>
              <td>{{ $per->telefono }}</td>
              <td>

              </td>
              <td>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalPer{{$per->id}}">
  Mostrar Materias
</button>

<!-- Modal -->
<div class="modal fade" id="ModalPer{{$per->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Materias</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr>
            <th>NOMBRE</th>
            <th>SIGLA</th>
            <th>SEMESTRE</th>
          </tr>
          @foreach ($per->materias as $materia)
          <tr>
            <td>{{ $materia->nombre }}</td>
            <td>{{ $materia->sigla }}</td>
            <td>{{ $materia->semestre }}</td>
          </tr>
            
          @endforeach

        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPersonaAsig{{ $per->id }}">
  Asignar Materias
</button>

<!-- Modal -->
<div class="modal fade" id="modalPersonaAsig{{ $per->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('asignacion_materias_personas', $per->id) }}" method="get">
      <div class="modal-body">
        <label for="">Seleccionar Carrera:</label>
        <select name="carrera_id" id="" class="form-control">
          @foreach ($lista_carreras as $carrera)
          <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>            
          @endforeach
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Asignar</button>
      </div>
      </form>
    </div>
  </div>
</div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEditar{{$per->id}}">
                  <i class="fa fa-edit"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modalEditar{{$per->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Persona</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{ route('persona.update', $per->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                          <label for="">Ingrese Nombre</label>
                          <input type="text" name="nombres" class="form-control @error('nombres') is-invalid @enderror" value="{{ $per->nombres }}">
                          @error('nombres')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          <label for="">Ingrese Ap. Paterno</label>
                          <input type="text" name="paterno" class="form-control" value="{{ $per->paterno }}">

                          <label for="">Ingrese Ap. Materno</label>
                          <input type="text" name="materno" class="form-control" value="{{ $per->materno }}">
                          <label for="">Ingrese CI:</label>
                          <input type="text" name="ci" class="form-control @error('ci') is-invalid @enderror" value="{{ $per->ci }}">
                          @error('ci')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          <label for="">Ingrese Dirección</label>
                          <input type="text" name="direccion" class="form-control" value="{{ $per->direccion }}">
                          <label for="">Ingrese Telefono</label>
                          <input type="text" name="telefono" class="form-control" value="{{ $per->telefono }}">

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-primary">Modificar Persona</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>


                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar{{ $per->id }}">
                  <i class="fa fa-trash"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modalEliminar{{ $per->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar persona</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        ¿Está seguro de Eliminar a la Perona?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('persona.destroy', $per->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>

            @endforeach
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>
@else
<h1>No tiene permisos para ver esta página</h1>
@endauth
@endsection