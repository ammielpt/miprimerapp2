<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //busca messages; valor por defecto
    //si queremos usar otro nombre de la tabal seria
    //protected $table= 'nombre_de_mi_tabla';
    protected $fillable = ['nombre', 'email', 'mensaje'];
}
