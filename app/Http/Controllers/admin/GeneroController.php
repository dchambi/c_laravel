<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Genero;
class GeneroController extends Controller
{ /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       // Listado de registros
       //$generos = Genero::all();                           //obtener todos los registros
       //$generos = Genero::Orderby('id','DESC')->get();     //obtener todos los registros ordenados
       //dd($generos);
       $generos = Genero::Orderby('id','DESC')->paginate(5);     //obtener todos los registros ordenados y paginados de 5
       // Enviar Listado de registros a una vista
       $data['generos']=$generos;
       return view('admin.genero.index', $data);

   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {  // Renderizar n formulario para nuevo registro
       return view('admin.genero.create');
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
       $genero =new Genero($request->all());   //Obtiene todos los datos
       //dd($genero);  //var_dump($genero);
       //dd($genero->name);  //solo muestra nombre;
       //2. Cifrar password
       //$genero->password=bcrypt($genero->password);
     //  $genero->genero = $request->genero;
       $genero->genero = $request->genero;
       //3. Guardar en la base de datos
       $genero->save();
       //4. Mostrar mensaje
       //return 'Genero registrado correctamente';
       flash('Genero registrado correctamente')->success();
       //5. Redireccionamos a listar usuarios
       return redirect()->route('genero.index');
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
    $genero = Genero::find($id);
    // dd($genero);
    $data['genero'] = $genero;
    return view('admin.genero.edit', $data);
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
       $genero=Genero::find($id);
       // 2. Editar Valores
       //$genero->fill($request->all());
       $genero->genero = $request->genero;
       // 3. Guardar Cambios
       $genero->save();
       // 4. Preparar mensaje
       flash('Genero editado correctamente')->success();
       // 5. Redireccionar
       return redirect()->route('genero.index');
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
       $genero=Genero::find($id);
       // 2 Eliminar registro
       if($genero){
       $genero->delete();
       // 3. preparar mensaje
       flash ('Se ha eliminado '.$genero->name.' correctamente')->success();
       }
       else{
       // 3. preparar mensaje de error
       flash ('No existe el id '.$id.'.')->error();
       
       }
       // 4. Redireccionar 
       return redirect()->route('genero.index');
   }
   
}
