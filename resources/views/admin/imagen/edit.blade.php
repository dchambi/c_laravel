@extends('layouts.main')

@section('title','EDITAR IMAGEN')

@section('content')
	{!! Form::open(['route'=>['imagen.update', $imagen], 'method'=>'PUT']) !!}
		<div class="form-group">
			{!! Form::label('nombre', 'Nombre:') !!}
			{!! Form::text('nombre', $imagen->imagen, ['class' => 'form-control', 
			'placeholder' => 'Nombre de la imagen','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('pelicula_id', 'Nombre:') !!}
			{!! Form::text('pelicula_id', $imagen->imagen, ['class' => 'form-control', 
			'placeholder' => 'Nombre de la pelicula_id','required']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@endsection