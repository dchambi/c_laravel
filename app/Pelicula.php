<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    protected $table='peliculas';
    //indicar clave primaria
    protected $primaryKey='id';
    protected $fillabe = ['titulo','costo','resumen','estreno','genero_id','user_id'];
    //indicar las fechaspara guardas y actualizar las gestiona el framework
    public $timestamps =true;
    
    //Mapear relacion 1 a 1
    // una pelicula perenece a un usuario
    public function user(){
    return $this->belongsTo('App\User');
        }

    //Mapear relacion 1 a 1
    // una pelicula perenece a un genero
    public function genero(){
        return $this->belongsTo('App\Genero');
        }
    //Mapear relacion 1 a N
    // una pelicula tiene varias imagenes
    public function imagenes(){
        //retornar tipo de relacion
    return $this->hasMany('App\Imagen');
    }
    //Mapear relacion N a M
    // una pelicula pertenece a muchos directores
    public function directores(){
        //retornar tipo de relacion
    return $this->belongsToMany('App\Director','pelicula_director')->withTimestamps();
    }
    


}