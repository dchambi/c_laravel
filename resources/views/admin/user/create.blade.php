@extends('layouts.main')

@section('title','NUEVO USUARIO')

@section('content')
    {!! Form::open(['route'=>'user.store'])!!}
        <div class="form-group">
            {!! Form::label('name','Nombre:')!!}
            {!! Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Nombre del Usuario','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password','Contraseña:')!!}
            {!! Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingrese contraseña','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','Correo Electronico:')!!}
            {!! Form::text('email',null,['class'=>'form-control', 'placeholder'=>'ejemplo@gmail.com','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('type','Tipo de Usuario:')!!}
            {!! Form::select('type',['member'=>'Miembro','admin'=>'Administrador'],null,['class'=>'form-control', 'placeholder'=>'Seleccione una opcion','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
        </div>
    {!! Form::close()!!}
@endsection