<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lmts\src\controller\LmtsApi;
use Illuminate\Support\Facades\Storage;
use App\Ppc;
use App\Arquivo;
use App\User;


class CoordenadorController extends Controller
{
  private $api;

  public function __construct(){
    $this->api = new LmtsApi();
  }

  public function index(){
      return view('coordenador.home');
  }

  public function verAbertos(Request $request){
      $nomeCurso = $this->api->getPais(6, session('unidadeOrgId'));
      $nomeCurso = $nomeCurso[0]['nome'];
      $processos = Ppc::where('cursoId', session('unidadeOrgId'))->where('status', 'processando')->get();
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
    $arquivos = Arquivo::where('ppcId', $ppc->id)->orderBy('updated_at', 'desc')->get();
    return view('coordenador.acompanharProcesso', [
                                                    'ppc'         => $ppc,
                                                    'arquivos'    => $arquivos,
                                                    'nomeCurso'   => $nomeCurso,
                                                    'nomeUnidade' => $nomeUnidade,
                                                  ]);
  }

  public function verFinalizados(Request $request){
    $curso = $this->api->getPais(6, session('unidadeOrgId'));
    $nomeCurso = $curso[0]['nome'];
    $processos = Ppc::where('status', 'finalizado')->where('cursoId', session('unidadeOrgId'))->orderBy('updated_at', 'desc')->get();
    return view('coordenador.processosFinalizados', [
                                                  'nomeCurso' => $nomeCurso,
                                                  'processos' => $processos,
                                                ]);
  }

  public function retomar(Request $request){
    $this->authorize('reabrirPpc', User::class);

    $ppc = Ppc::find($request->idProcesso);
    $ppc->status = 'processando';
    $ppc->save();
    return redirect()->route('home');
  }

  public function novaVersao(Request $request){
    $this->authorize('novaVersaoPpc', User::class);

    $validatedData = $request->validate([
      'arquivo' => ['required', 'file', 'mimes:pdf'],
    ]);

    $ppc = Ppc::find($request->idProcesso);
    $arquivos = $ppc->arquivo;
    $aux = [];
    foreach ($arquivos as $key) {
      $string = explode('/', $key->anexo);
      $string = explode('.pdf', $string[2]);
      $string = $string[0];
      array_push($aux, $string);
    }
    $arquivos = $aux;
    $count = 1;
    foreach ($arquivos as $key) {
      $count++;
    }

    $file = $request->arquivo;
    $path = session('unidadeOrgId') . '/' . $ppc->id . '/';
    $nome = $count . ".pdf";
    Storage::putFileAs($path, $file, $nome);

    $arquivo = Arquivo::create([
      'status' => 'processando',
      'anexo'  => $path . $nome,
      'ppcId'  => $ppc->id,

    ]);

    return redirect()->route('home');

  }
}
