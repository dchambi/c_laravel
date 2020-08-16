@extends('layouts.main')

@section('title','Componentes Blade')

@section('content')
{{-- USO DE PHP EN BLADE --}}
<?php   $nombre='Pablo';
        $edad=12;
?>
<H3>IMPRIME DATOS</H3>
<p>Nombre: {{$nombre}} </p>   
<p>Edad: {{$edad}} </p>
<p>Suma: {{$edad+5}} </p>
<p>Logica: {{TRUE or FALSE}} </p>

<H3>condicional IF</H3>
@if($edad>=18)
<p> {{$nombre}} es mayor de edad </p>
@else
<p> {{$nombre}} es menor de edad </p>
@endif

<h2>CONDICIONAL SWITCH</h2>
<?php $mes=2; ?>
@switch($mes)
    @case(1)
        <p>ENERO</p>
        @break
    @case(2)
        <p>FEBRERO</p>
        @break
    @default
    <p>mes desconocido</p>
    @endswitch

<h2>BUCLE FOR</h2>
<UL>
    @for($i=1;$i<=10;$i++)
    <li> {{$i}} </li>   
    @endfor
</UL>

<h2>BUCLE FOREACH</h2>
<?php $nombres = array('Juyan','Carlos','Omar');?>
<UL>
    @foreach($nombres as $nombre)
    <li> {{$nombre}} </li>   
    @endforeach
</UL>

<h2>BUCLE FOREACH</h2>
@php $nombres = array('Juyan','Carlos','Omar');
@endphp
<UL>
    @foreach($nombres as $nombre)
    <li> {{$nombre}} </li>   
    @endforeach
</UL>
@endsection
