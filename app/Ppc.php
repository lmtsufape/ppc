<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ppc extends Model
{
  protected $fillable = [
                          'cursoId',
                          'status',
                          'ano',
                        ];


  public function arquivo()
  {
      return $this->hasMany('App\Arquivo');
  }
}
