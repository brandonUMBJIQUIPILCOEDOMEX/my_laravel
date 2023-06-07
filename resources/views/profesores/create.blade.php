@extends('layout/template')

@section('title','Registrar Profesor | Escuela')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Registrar profesor</h2>

        @if ($errors->any())

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul> @foreach($errors->all() as $error)
                <li> {{ $error }} </li>
                 @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>

        @endif

        <form action="{{ url('profesores') }}" method="post">

            @csrf

            <!-- /* =============== NOMBRE =============== */ -->
            <div class="mb-3 row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>

                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
                </div>
            </div>

            <!-- /* =============== APELLIDO PATERNO =============== */ -->
            <div class="mb-3 row">
                <label for="a_paterno" class="col-sm-2 col-form-label">Apellido paterno:</label>

                <div class="col-sm-5">
                    <input type="text" class="form-control" name="a_paterno" id="a_paterno" value="{{ old('a_paterno') }}" required>
                </div>
            </div>


            <!-- /* =============== APELLIDO MATERNO =============== */ -->
            <div class="mb-3 row">
                <label for="a_materno" class="col-sm-2 col-form-label">Apellido materno:</label>

                <div class="col-sm-5">
                    <input type="text" class="form-control" name="a_materno" id="a_materno" value="{{ old('a_materno') }}" required>
                </div>
            </div>

            <!-- /* =============== APELLIDO ESPECIALIDAD =============== */ -->
            <div class="mb-3 row">
                <label for="especialidad" class="col-sm-2 col-form-label">Especialidad:</label>

                <div class="col-sm-5">
                    <input type="text" class="form-control" name="especialidad" id="especialidad" value="{{ old('especialidad') }}" required>
                </div>
            </div>

            <!-- /* =============== BOTON ENVIAR FORMULARIO =============== */ -->
            <a href="{{ url('profesores') }}" class="btn btn-secondary">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</button>





        </form>
    </div>
</main>