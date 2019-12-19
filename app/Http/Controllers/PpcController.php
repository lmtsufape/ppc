<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Lmts\src\controller\LmtsApi;
use App\Ppc;
use App\Arquivo;

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
      // 'ano'     => ['required', 'string'],
    ]);
    $ppc = Ppc::create([
      'status'  => 'processando',
      'cursoId' => session('unidadeOrgId'),
    ]);
    $file = $request->arquivo;
    $path = session('unidadeOrgId') . '/' . $ppc->id . '/';
    $nome = "1.pdf";
    Storage::putFileAs($path, $file, $nome);

    $arquivo = Arquivo::create([
      'status' => 'processando',
      'anexo'  => $path . $nome,
      'ppcId'  => $ppc->id,

    ]);

    return redirect()->route('home');

  }

}
