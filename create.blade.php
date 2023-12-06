@extends('adminlte::page')

@section('title', 'nuevo alumno')

@section('content_header')
    <h1>nuevo alumno</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
        {!! Form::open(['route'=>'student.store']) !!}
            <div class="form-group">
                {!! Form::label('number_control', 'number_control',) !!}
                {!! Form::number('number_control', null, ['class'=>'form-control', 'placeholder'=>'numero de control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Nombre', 'Nombre') !!}
                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'nombre del alumno']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Apellido Paterno', 'Apellido Paterno') !!}
                {!! Form::text('apellido_paterno', null, ['class'=>'form-control','placeholder'=>'apellido paterno']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Apellido Materno', 'Apellido Materno') !!}
                {!! Form::text('apellido_materno', null, ['class'=>'form-control','placeholder'=>'apellido materno']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Programa educativo', 'Programa educativo') !!}

                <select name="career_id">
                    <option selected>Selecciona la carrera:</option>
                    @foreach ($careers as $c )
                        <option value="{{ $c->id}}">{{ $c->study_program}}</option>
                    @endforeach
                </select>
            </div>
                {!! Form::submit('guardar alumno',['class' =>'btn btn-primary']) !!}
        {!! Form::close() !!}

        </div>


    </div>
@stop