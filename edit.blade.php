@extends('adminlte::page')

@section('title', 'Editar Inscripción')

@section('content_header')
    <!-- Encabezado si es necesario -->
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('student.update', $student) }}">
                @method("PUT")
                @csrf
               

                <div class="form-group">
                    <label for="number_control">Número de control</label>
                    <input type="text" name="number_control" id="number_control" class="form-control" value="{{ $student->number_control }}">
                </div>
                
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}">
                </div>

                <div class="form-group">
                    <label for="apellido_paterno">Apellido paterno</label>
                    <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" value="{{ $student->apellido_paterno }}">
                </div>

                <div class="form-group">
                    <label for="apellido_materno">Apellido materno</label>
                    <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" value="{{ $student->apellido_materno }}">
                </div>

                <div class="form-group">
                    <label for="career_id">Carrera</label>
                    <select name="career_id" id="career_id" class="form-control">
                        @foreach ($career as $career)
                            <option value="{{ $student->id }}" {{ $student->career_id == $career->id ? 'selected' : '' }}>
                                {{ $career->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                

                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
        </div>
    </div>
@stop
