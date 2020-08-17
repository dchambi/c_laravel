<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Imagen;
class ImagenController extends Controller
{/**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        // Listado de registros
        //$imagenes = Imagen::all();                           //obtener todos los registros
        //$imagenes = Imagen::Orderby('id','DESC')->get();     //obtener todos los registros ordenados
        //dd($imagenes);
        $imagenes = Imagen::Orderby('id','DESC')->paginate(5);     //obtener todos los registros ordenados y paginados de 5
        // Enviar Listado de registros a una vista
        $data['imagenes']=$imagenes;
        return view('admin.imagen.index', $data);
 
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  // Renderizar n formulario para nuevo registro
        return view('admin.imagen.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1. Obtener todos los datos del formulario
        $imagen =new Imagen($request->all());   //Obtiene todos los datos
        //dd($imagen);  //var_dump($imagen);
        //dd($imagen->name);  //solo muestra nombre;
        //2. Cifrar password
        //$imagen->password=bcrypt($imagen->password);
        $imagen->nombre = $request->nombre;
        $imagen->pelicula_id = $request->pelicula_id;
       // $imagen->imagen = $request->imagen;
        //3. Guardar en la base de datos
        $imagen->save();
        //4. Mostrar mensaje
        //return 'Imagen registrado correctamente';
        flash('Imagen registrado correctamente')->success();
        //5. Redireccionamos a listar usuarios
        return redirect()->route('imagen.index');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Mostrar informacion detallada
 
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // Renderizar formulario para editar
     $imagen = Imagen::find($id);
     // dd($imagen);
     $data['imagen'] = $imagen;
     return view('admin.imagen.edit', $data);
    }
 
    
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Registrar cambios en la base de datos
        //dd($request-all());
        // 1. Buscar Registro a modificar
        $imagen=Imagen::find($id);
        // 2. Editar Valores
        //$imagen->fill($request->all());
        $imagen->nombre = $request->nombre;
        $imagen->pelicula_id = $request->pelicula_id;
        // 3. Guardar Cambios
        $imagen->save();
        // 4. Preparar mensaje
        flash('Imagen editado correctamente')->success();
        // 5. Redireccionar
        return redirect()->route('imagen.index');
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminar un registro
        // 1 Buscar Registro a eliminar
        $imagen=Imagen::find($id);
        // 2 Eliminar registro
        if($imagen){
        $imagen->delete();
        // 3. preparar mensaje
        flash ('Se ha eliminado '.$imagen->name.' correctamente')->success();
        }
        else{
        // 3. preparar mensaje de error
        flash ('No existe el id '.$id.'.')->error();
        
        }
        // 4. Redireccionar 
        return redirect()->route('imagen.index');
    }
}
