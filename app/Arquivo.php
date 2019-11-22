<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
  public function ppc(){
    return $this->belongsTo(Ppc::class, 'ppcId');
  }

  public function pareceres()
  {
      return $this->hasMany(Parecer::class);
  }

}
