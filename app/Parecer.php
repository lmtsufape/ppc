<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parecer extends Model
{
  public function arquivo(){
    return $this->belongsTo(Arquivo::class, 'arquivoId');
  }
}
