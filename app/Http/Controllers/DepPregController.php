<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lmts\src\controller\LmtsApi;

class DepPregController extends Controller
{

  private $api;

  public function __construct()
  {
    $this->api = new LmtsApi();
  }




  public function index(){
    if(session('tipoNome') == 'CPE'){
      return view('cpe.home');
    }
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
