<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Importar clases del modelo
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Listado de registros
        //$users = User::all();                           //obtener todos los registros
        //$users = User::Orderby('id','DESC')->get();     //obtener todos los registros ordenados
        //dd($users);
        $users = User::Orderby('id','DESC')->paginate(10);     //obtener todos los registros ordenados y paginados de 5
        // Enviar Listado de registros a una vista
        $data['users']=$users;
        return view('admin.user.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  // Renderizar n formulario para nuevo registro
        return view('admin.user.create');
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
        $user =new User($request->all());   //Obtiene todos los datos
        //dd($user);  //var_dump($user);
        //dd($user->name);  //solo muestra nombre;
        //2. Cifrar password
        $user->password=bcrypt($user->password);
        //3. Guardar en la base de datos
        $user->save();
        //4. Mostrar mensaje
        //return 'Usuario registrado correctamente';
        flash('Usuario registrado correctamente')->success();
        //5. Redireccionamos a listar usuarios
        return redirect()->route('user.index');
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
     $user = User::find($id);
     // dd($user);
     $data['user'] = $user;
     return view('admin.user.edit', $data);
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
        $user=User::find($id);
        // 2. Editar Valores
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        // 3. Guardar Cambios
        $user->save();
        // 4. Preparar mensaje
        flash('Usuario editado correctamente')->success();
        // 5. Redireccionar
        return redirect()->route('user.index');
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
        $user=User::find($id);
        // 2 Eliminar registro
        if($user){
        $user->delete();
        // 3. preparar mensaje
        flash ('Se ha eliminado '.$user->name.' correctamente')->success();
        }
        else{
        // 3. preparar mensaje de error
        flash ('No existe el id '.$id.'.')->error();
        }
        // 4. Redireccionar 
        return redirect()->route('user.index');
    }
}
