<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Lmts\src\controller\LmtsApi;
use Illuminate\Http\Request;

class NdeController extends Controller
{
    private $api;

    public function __construct()
    {
      $this->api = new LmtsApi();
    }

    //
    public function index(){
        return view('nde.home');
    }
    public function indexReabrirProcesso(){
      return view('nde.reabrirProcesso');
    }

    public function solicitarAjustes(){
      return view('nde.solicitarAjustes');
    }


}
