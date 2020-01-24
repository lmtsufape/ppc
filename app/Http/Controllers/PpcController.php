<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Lmts\src\controller\LmtsApi;
use App\Ppc;
use App\Arquivo;
use App\User;

class PpcController extends Controller
{
  private $api;

  public function __construct()
  {
    $this->api = new LmtsApi();
  }



  public function cadastrar(){
    $curso = $this->api->getPais(6, session('unidadeOrgId'));
    $nomeCurso = $curso[0]['nome'];
    $nomeUnidade = $curso[2]['nome'];
    return view('ppc.cadastrar',[
                                  'nomeCurso' => $nomeCurso,
                                  'nomeUnidade' => $nomeUnidade,
                                ]);
  }

  public function criar(Request $request){
    $this->authorize('abrirPpc', User::class);

    $validatedData = $request->validate([
      'arquivo' => ['required', 'file', 'mimes:pdf'],
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
  public function indexReabrirPpc(){
    return view('nde.reabrirProcesso');
  }

}
