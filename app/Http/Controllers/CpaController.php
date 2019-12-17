<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CpaController extends Controller
{
    //
    public function index(){
        return view('cpa.home');
    }
  
    // lista os ppcs finalizados
    public function finalizados(){
      return view('cpa.listarPpcsFinalizados');
    }
    public function ajustes(){
      return view('cpa.listarPpcsAjustes');
    }
    public function acompanharProcesso(){
      return view('cpa.acompanharProcesso');
    }
}
