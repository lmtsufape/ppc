<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lmts\src\controller\LmtsApi;
use App\Ppc;
use App\Arquivo;


class CoordenadorController extends Controller
{
  private $api;

  public function __construct()
  {
    $this->api = new LmtsApi();
  }

  public function index(){
      return view('coordenador.home');
  }

  public function verProcessos(Request $request){
      $nomeCurso = $this->api->getPais(6, session('unidadeOrgId'));
      $nomeCurso = $nomeCurso[0]['nome'];
      $processos = Ppc::where('cursoId', session('unidadeOrgId'))->get();
      return view('coordenador.processosAbertos', [
                                                    'nomeCurso' => $nomeCurso,
                                                    'processos' => $processos,
                                                  ]);
  }

  public function acompanhar(Request $request){
    $curso = $this->api->getPais(6, session('unidadeOrgId'));
    $nomeCurso = $curso[0]['nome'];
    $nomeUnidade = $curso[2]['nome'];
    $ppc = Ppc::find($request->idProcesso);
    $arquivos = Arquivo::where('ppcId', $ppc->id)->orderBy('updated_at', 'asc')->get();
    return view('coordenador.acompanharProcesso', [
                                                    'ppc'         => $ppc,
                                                    'arquivos'    => $arquivos,
                                                    'nomeCurso'   => $nomeCurso,
                                                    'nomeUnidade' => $nomeUnidade,
                                                  ]);
  }
}
