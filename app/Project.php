<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'url', 'description'];
    //protected $guarded=['id','approved','created_at','updated_at'];  cualquier campo que no se encuentra en esta lista se guardará.
    //
    public function getRouteKeyName()
    {
        return 'url';
    }
}
