<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $table='directores';
    //indicar clave primaria
    protected $primaryKey='id';
    protected $fillabe = ['nombre'];
    //indicar las fechaspara guardas y actualizar las gestiona el framework
    public $timestamps =true;

    //Mapear relacion N a M
    // un director tiene muchas peliculas
    public function peliculas(){
        //retornar tipo de relacion
    return $this->belongsToMany('App\Pelicula','pelicula_director');
    }
}
