<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Director;
class DirectorController extends Controller
{/**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        // Listado de registros
        //$directores = Director::all();                           //obtener todos los registros
        //$directores = Director::Orderby('id','DESC')->get();     //obtener todos los registros ordenados
        //dd($directores);
        $directores = Director::Orderby('id','DESC')->paginate(5);     //obtener todos los registros ordenados y paginados de 5
        // Enviar Listado de registros a una vista
        $data['directores']=$directores;
        return view('admin.director.index', $data);
 
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  // Renderizar n formulario para nuevo registro
        return view('admin.director.create');
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
        $director =new Director($request->all());   //Obtiene todos los datos
        //dd($director);  //var_dump($director);
        //dd($director->name);  //solo muestra nombre;
        //2. Cifrar password
        //$director->password=bcrypt($director->password);
        $director->nombre = $request->nombre;
       // $director->director = $request->director;
        //3. Guardar en la base de datos
        $director->save();
        //4. Mostrar mensaje
        //return 'Director registrado correctamente';
        flash('Director registrado correctamente')->success();
        //5. Redireccionamos a listar usuarios
        return redirect()->route('director.index');
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
     $director = Director::find($id);
     // dd($director);
     $data['director'] = $director;
     return view('admin.director.edit', $data);
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
        $director=Director::find($id);
        // 2. Editar Valores
        //$director->fill($request->all());
        $director->nombre = $request->nombre;
        //$director->director = $request->director;
        // 3. Guardar Cambios
        $director->save();
        // 4. Preparar mensaje
        flash('Director editado correctamente')->success();
        // 5. Redireccionar
        return redirect()->route('director.index');
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
        $director=Director::find($id);
        // 2 Eliminar registro
        if($director){
        $director->delete();
        // 3. preparar mensaje
        flash ('Se ha eliminado '.$director->name.' correctamente')->success();
        }
        else{
        // 3. preparar mensaje de error
        flash ('No existe el id '.$id.'.')->error();
        
        }
        // 4. Redireccionar 
        return redirect()->route('director.index');
    }
}
