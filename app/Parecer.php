<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parecer extends Model
{
  protected $fillable = [
                          'status',
                          'anexo',
                          'arquivoId',
                          'tipo'
                        ];


  public function arquivo(){
    return $this->belongsTo('App\Arquivo', 'arquivoId');
  }
}
