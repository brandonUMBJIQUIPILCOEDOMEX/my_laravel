@extends('layout/template')

@section('title','Profesores | Escuela')

@section('contenido')

<main>

    <div class="container py-4">
        <h2> Listado de profesores</h2>
        <a href="{{url('profesores/create')}}" class="btn btn-primary btn-sm"> Nuevo registro</a>

        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                <th>Especialidad</th>
                <th></th>
                <th></th>
            </tr>




            <tbody>
                @foreach($profesores as $profesor)

                <tr>
                    <td>{{ $profesor->clave_profesor }}</td>
                    <td>{{ $profesor->nombre }}</td>
                    <td>{{ $profesor->apellido_paterno }}</td>
                    <td>{{ $profesor->apellido_paterno }}</td>
                    <td>{{ $profesor->especialidad }}</td>
                    <td> <a href="{{ url('profesores/'.$profesor->clave_profesor.'/edit') }}" class="btn btn-warning btn-sm">Editar </a></td>
                    <td>
                        <form action="{{ url('profesores/'.$profesor->clave_profesor) }}" method="post">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</main>