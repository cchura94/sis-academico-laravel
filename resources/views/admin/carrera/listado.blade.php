@extends("layouts.template_admin")

@section("titulo", "Gestión Carreras y Materias")

@section("contenido")



<div class="row">
  <div class="col-md-12">

    <div class="card">
      <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Nueva Carrera
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Carrera</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('carrera.store') }}" method="post">
                @csrf
              <div class="modal-body">
                <label for="">Ingrese Nombre de Carrera</label>
                <input type="text" name="nombre" class="form-control">
                <label for="">Ingrese Numero de semestres</label>
                <input type="number" name="nro_semestres" class="form-control">
                <label for="">Ingrese Detalles</label>
                <textarea name="detalle" class="form-control"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar Carrera</button>
              </div>
              </form>
            </div>
          </div>
        </div>


        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>NOMBRE CARRERA</th>
              <th>NRO SEMESTRES</th>
              <th>MATERIAS</th>
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($lista_carreras as $carrera)
            <tr>
              <td>{{ $carrera->id }}</td>
              <td>{{ $carrera->nombre }}</td>
              <td>{{ $carrera->nro_semestres }}</td>
              <td>
                <!-- Button trigger modal -->
<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#Modal{{$carrera->id}}" onclick="listarMaterias('{{$carrera->id}}')">
  ver Materias
</button>

<!-- Modal -->
<div class="modal dialog-scrollable fade" id="Modal{{$carrera->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Materias Carrera {{ $carrera->nombre }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <form action="{{ route('materia.store') }}" method="post">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <label for="">Ingrese Nombre Materia</label>
                  <input type="text" name="nombre" id="nombre_mat{{$carrera->id}}" class="form-control" required>

                </div>
                <div class="col-md-2">
                  <label for="">Sigla</label>
                  <input type="text" name="sigla" id="sigla_mat{{$carrera->id}}" class="form-control" required>

                </div>
                <div class="col-md-4">
                <label for="">Semestre </label>
                  <select name="semestre" class="form-control" id="semestre_mat{{$carrera->id}}" required>
                    @php
                      for($i=1; $i<= $carrera->nro_semestres; $i++){
                    @endphp
                    <option value="{{$i}}">{{$i}} SEMESTRE</option>
                    @php
                      }
                    @endphp

                  </select>
                </div>
                <div class="col-md-12">
                <label for="">Ingrese Descripción</label>
                <textarea name="descripcion" class="form-control" id="descripcion_mat{{$carrera->id}}"></textarea>
                <input type="hidden" value="{{ $carrera->id }}" name="carrera_id">
                </div>
                <input type="submit" value="Guardar Materia" class="btn btn-info">
                <button type="button" class="btn btn-warning" onclick="guardarMateria('{{ $carrera->id }}')">GUARDAR MATERIA JS</button>
              </div>

            </form>

          </div>
          <div class="col-md-12">
            <table class="table table-strped table-hover">
              <thead>
                <tr>
                  <td>NOMBRE</td>
                  <td>SIGLA</td>
                  <td>SEMESTRE</td>
                </tr>

              </thead>
              <tbody id="id_table_materias{{$carrera->id}}">

              </tbody>
            </table>
            <span id="cargando{{$carrera->id}}"></span>

          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
              </td>
              <td>

              </td>
            </tr>              
            @endforeach
          </tbody>

        </table>
      </div>

    </div>

  </div>
</div>



@endsection


@section("js")

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  //listarMaterias(1);
  //document.getElementById("cargando").innerHTML = "<h1>cargando...</h1>";

  async function guardarMateria(carrera_id){
    document.getElementById("cargando"+carrera_id).innerHTML = "<h1>guardando...</h1>";

    var carrera_id = carrera_id;
    var nombre = document.getElementById("nombre_mat"+carrera_id).value;
   
    var sigla = document.getElementById("sigla_mat"+carrera_id).value;
    var descripcion = document.getElementById("descripcion_mat"+carrera_id).value;
    var semestre = document.getElementById("semestre_mat"+carrera_id).value;

    let obj = {
      carrera_id: carrera_id,
      nombre: nombre,
      sigla: sigla,
      descripcion: descripcion,
      semestre: semestre
    }
    // peticion ajax con axios
    const {data} = await axios.post("/admin/materia", obj);
    if(data){
      listarMaterias(carrera_id);
      document.getElementById("cargando"+carrera_id).innerHTML = "<h1>cargando...</h1>";
    }
  }

  async function listarMaterias(carrera_id){
    document.getElementById("cargando"+carrera_id).innerHTML = "<h1>cargando...</h1>";

    const {data} = await axios.get("/admin/carrera/"+carrera_id);
    var html=``;
    for (let i = 0; i < data.length; i++) {
      const materia = data[i];
      html += `
              <tr>
                <td>${materia.nombre}</td>
                <td>${materia.sigla}</td>
                <td>${materia.semestre}</td>
              </tr>
      `;      
    }
    document.getElementById("id_table_materias"+carrera_id).innerHTML = html;
    document.getElementById("cargando"+carrera_id).innerHTML = "";
  }

</script>

@endsection