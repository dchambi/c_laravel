@extends('layouts.main')

@section('title','MENU PRINCIPAL')

@section('content')
    <a href="{{ url('/hola/rutas')}}">1. Hola Rutas</a></br>
    <a href="{{ url('/saludo/dia')}}">2. Grupos de Rutas - saludo dia</a></br>
    <a href="{{ route('practica3')}}">3. Grupos de Rutas - saludo tarde</a></br>
    {!! link_to_route('practica4',$title='4. Grupos de rutas - saludo noche')!!}</br>
    <a href="{{ route('practica5')}}">5. Hola desde el controlador</a></br>
    <a href="{{ route('practica6',['nombre'=>'Ana','edad'=>45]) }}">6. Paso de parametros</a></br>
    <a href="{{ route('practica7')}}">7. Saludo desde view</a></br>
    <a href="{{ route('practica8',['nombre'=>'Ana','edad'=>45]) }}">8. Datos desde el controlador</a></br>
    <a href="{{ route('practica9')}}">9. Componentes blade</a></br>
    
@endsection