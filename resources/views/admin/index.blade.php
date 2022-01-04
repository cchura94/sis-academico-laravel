@extends("layouts.template_admin")

@section("titulo", "Administración")

@section("contenido")

<div class="row">
    <div class="col-lg-12">

        <div class="card card-primary card-outline">
            <div class="card-body">
                <h1>ADMINISTRACIÓN</h1>

                @include("admin.prueba")
            </div>
        </div><!-- /.card -->
    </div>
</div>

@endsection