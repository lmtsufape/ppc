<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ppc extends Model
{
  public function arquivos()
  {
      return $this->hasMany(Arquivo::class);
  }
}
