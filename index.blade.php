@extends('adminlte::page')

@section('title', 'student')
    Student


@section('content')

<div class="card-header">
    <a href="{{route('student.create')}}" class="btn btn-primary">agregar</a>
</div>

<table class="table table-striped table-hover" id="student">
    <thead>
        <tr>
            <th>Number Control</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Carrera</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($student as $s)
        <tr>
            <td>{{ $s->number_control }}</td>
            <td>{{ $s->name }}</td>
            <td>{{ $s->apellido_paterno }}</td>
            <td>{{ $s->apellido_materno }}</td>
            <td>
                @foreach ($careers as $c)
                    {{ $s->career_id == $c->id ? $c->study_program : ''}}
                @endforeach
            </td>
            <a href="{{ route('student.edit', ['student' => $s]) }}" class="btn btn-primary">Editar</a>


                <td width="15px">
                    <form action="{{route('student.destroy', $s)}}" method="POST">
                        @method('delete')
                        @csrf
                        <input type="submit" value="eliminar" class="btn btn-danger btn-sm">                        
                    </form>
                </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        new DataTable('#student');
    </script>
@endsection