<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ppc;
use App\Arquivo;
use Lmts\src\controller\LmtsApi;

class PregController extends Controller
{
  private $api;

  public function __construct(){
    $this->api = new LmtsApi();
  }

  public function index(){
      return view('preg.home');
  }

  // lista os ppcs finalizados
  public function finalizados(Request $request){
    $processos = Ppc::where('status', 'finalizado')->orderBy('updated_at', 'desc')->get();
    return view('preg.listarPpcsFinalizados', [
                                              'processos' => $processos,
                                             ]);
  }

  public function ajustes(Request $request){
    $processos = Ppc::where('status', 'processando')->orderBy('updated_at', 'desc')->get();
    return view('preg.listarPpcsAjustes', [
                                          'processos' => $processos,
                                         ]);
  }
  public function acompanharProcesso(Request $request){
    $ppc = Ppc::find($request->idProcesso);
    $curso = $this->api->getPais(6, $ppc->cursoId);
    $nomeCurso = $curso[0]['nome'];
    $nomeUnidade = $curso[2]['nome'];
    $arquivos = Arquivo::where('ppcId', $ppc->id)->orderBy('updated_at', 'desc')->get();
    return view('preg.acompanharProcesso', [
                                                    'ppc'         => $ppc,
                                                    'arquivos'    => $arquivos,
                                                    'nomeCurso'   => $nomeCurso,
                                                    'nomeUnidade' => $nomeUnidade,
                                                  ]);
  }
}
