@extends('layouts.app')

@section('template_title')
    {{ $student->name ?? "{{ __('Show') Student" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Student</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('student.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Number Control:</strong>
                            {{ $student->number_control }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $student->name }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido Paterno:</strong>
                            {{ $student->apellido_paterno }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido Materno:</strong>
                            {{ $student->apellido_materno }}
                        </div>
                        <div class="form-group">
                            <strong>Career Id:</strong>
                            {{ $student->career_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
