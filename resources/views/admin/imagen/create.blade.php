@extends('layouts.main')

@section('title','NUEVA IMAGEN')

@section('content')
    {!! Form::open(['route'=>'Imagen.store'])!!}
        <div class="form-group">
            {!! Form::label('nombreImagen','Nombre:')!!}
            {!! Form::text('nombre',null,['class'=>'form-control', 
            'placeholder'=>'Nombre de la Imagen','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('pelicula_id','Nombre:')!!}
            {!! Form::text('pelicula_id',null,['class'=>'form-control', 
            'placeholder'=>'Pelicula Id','required']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
        </div>
    {!! Form::close()!!}
@endsection