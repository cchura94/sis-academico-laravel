<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AulaController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\PersonaController;

Route::get('/', function () {
    // return view('welcome');
    return redirect("/admin");
});



Route::middleware(['auth'])->prefix('admin')->group(function () {
    
    
    Route::get("/", function(){
        return view('admin.index');
    })->name("administracion");

    // asignación de materias
    Route::get("asignacion_materias", [MateriaController::class, "asignacion_materias"])->name("asignacion_materias");
    Route::get("persona/{id}/asignacion_materias_personas", [PersonaController::class, "asig_materias_persona"])->name("asignacion_materias_personas");
    Route::post("persona/{id}/asignar", [PersonaController::class, "asignar"])->name("asignar");
    Route::get("carrera/reportepdf", [CarreraController::class, "reporte"]);

    Route::resource("carrera", CarreraController::class)->middleware(["role:docente"]);
    Route::resource("aula", AulaController::class);
    Route::resource("periodo", PeriodoController::class);
    Route::resource("materia", MateriaController::class);
    Route::resource("persona", PersonaController::class);
    Route::resource("usuario", UsuarioController::class);

});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
