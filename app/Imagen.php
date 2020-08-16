<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table='imagenes';
    //indicar clave primaria
    protected $primaryKey='id';
    protected $fillabe = ['nombre','pelicula_id'];
    //indicar las fechaspara guardas y actualizar las gestiona el framework
    public $timestamps =true;

     //Mapear relacion 1 a 1
    // una imagen perenece a un pelicula
    public function pelicula(){
        return $this->belongsTo('App\Pelicula');
        }
}
