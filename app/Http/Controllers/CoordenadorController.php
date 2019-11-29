<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoordenadorController extends Controller
{
  public function index(){
      return view('coordenador.home');
  }
}
