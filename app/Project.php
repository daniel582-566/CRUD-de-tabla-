<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //protected $fillable = ['title','url','description'];
    protected $guarded = [];
    //  protected $guarded = []; user este mejor y filtrar con validate en controlador store y update
  //  public function getRouteKeyName(){return 'url';  }?? // cambia el primarykey por el definido

}
