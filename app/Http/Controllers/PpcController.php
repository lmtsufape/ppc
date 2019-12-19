<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Lmts\src\controller\LmtsApi;
use App\Ppc;

class PpcController extends Controller
{
  private $api;

  public function __construct()
  {
    $this->api = new LmtsApi();
  }



  public function cadastrar(){
      return view('ppc.cadastrar');
  }

  public function criar(Request $request){
    $validatedData = $request->validate([
      'arquivo' => ['file', 'mimes:pdf'],
      'ano'     => ['required', 'string'],
    ]);
    $file = $request->arquivo;
    $path = 'editais/';
    $nome = $request->nome . ".pdf";
    Storage::putFileAs($path, $file, $nome);
    Ppc::create([
      'arquivo' => $path . $nome,
      'ano'     => $request->ano,
      'status'  => 'processando',
    ]);
  }

}
