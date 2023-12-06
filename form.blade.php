<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('number_control') }}
            {{ Form::text('number_control', $student->number_control, ['class' => 'form-control' . ($errors->has('number_control') ? ' is-invalid' : ''), 'placeholder' => 'Number Control']) }}
            {!! $errors->first('number_control', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $student->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellido_paterno') }}
            {{ Form::text('apellido_paterno', $student->apellido_paterno, ['class' => 'form-control' . ($errors->has('apellido_paterno') ? ' is-invalid' : ''), 'placeholder' => 'Apellido Paterno']) }}
            {!! $errors->first('apellido_paterno', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellido_materno') }}
            {{ Form::text('apellido_materno', $student->apellido_materno, ['class' => 'form-control' . ($errors->has('apellido_materno') ? ' is-invalid' : ''), 'placeholder' => 'Apellido Materno']) }}
            {!! $errors->first('apellido_materno', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('career_id') }}
            {{ Form::text('career_id', $student->career_id, ['class' => 'form-control' . ($errors->has('career_id') ? ' is-invalid' : ''), 'placeholder' => 'Career Id']) }}
            {!! $errors->first('career_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>