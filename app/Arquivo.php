<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
  protected $fillable = [
                          'status',
                          'anexo',
                          'ppcId',
                        ];


  public function ppc(){
    return $this->belongsTo('App\Ppc', 'ppcId');
  }

  public function parecer()
  {
      return $this->hasMany('App\Parecer');
  }

}
