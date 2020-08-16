<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    //indicar nombre de la tabla
    protected $table='generos';
    //indicar clave primaria
    protected $primaryKey='id';
    protected $fillabe = ['genero'];
    //indicar las fechaspara guardas y actualizar las gestiona el framework
    public $timestamps =true;

    //Mapear relacion 1 a N
    // un genero tiene varias peliculas
    public function peliculas(){
        //retornar tipo de relacion
    return $this->hasMany('App\Pelicula');
    }

}
