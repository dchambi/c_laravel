@extends('layouts.main')

@section('title','LISTADO DE DIRECTORES')

@section('content')
    @include('flash::message')
    <a href="{{ route('director.create') }}" class="btn btn-primary">
    Nuevo Director</a>
    <Table class="table">
        <tr>
            <th>ID</th>
            <th>DIRECTOR</th>
            <th>ACCION</th>    
        </tr>
        @foreach($directores as $director)
        <tr>
            <td>{{ $director->id }}</td>
            <td>{{ $director->nombre }}</td>
            <td>
                <a href="{{ route ('director.destroy',$director->id) }}" 
                onclick="eliminarRegistro(event,this.href)"
                class="btn btn-danger btn-xs" title="Eliminar">
                <span class="glyphicon glyphicon-trash"></span>
                </a> 
                <a href="{{ route ('director.edit',$director->id) }}" 
                class="btn btn-success btn-xs" title="Editar">
                <span class="glyphicon glyphicon-pencil"></span>
                </a> 
            </td>
        </tr>
        @endforeach
    </Table>
    {{ $directores->links() }}
@endsection

@section('javascript')
    <script>
    function eliminarRegistro(event,url)
    {   event.preventDefault();
        if(confirm("Esta seguro de eliminar el registro")){
            window.location.href=url;
        }

    }
    </script>

@endsection