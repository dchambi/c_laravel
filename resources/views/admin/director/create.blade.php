@extends('layouts.main')

@section('title','NUEVO DIRECTOR')

@section('content')
    {!! Form::open(['route'=>'director.store'])!!}
        <div class="form-group">
            {!! Form::label('nombre','Nombre:')!!}
            {!! Form::text('nombrer',null,['class'=>'form-control', 
            'placeholder'=>'Nombre del Director','required']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
        </div>
    {!! Form::close()!!}
@endsection