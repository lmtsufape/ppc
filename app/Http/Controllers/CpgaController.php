<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ppc;
use Lmts\src\controller\LmtsApi;
use Illuminate\Support\Facades\Storage;
use App\Arquivo;
use App\Parecer;


class CpgaController extends Controller
{
    private $api;

    public function __construct(){
      $this->api = new LmtsApi();
    }

    public function index(Request $request){
        return view('cpga.home');
    }

    // lista os ppcs finalizados
    public function finalizados(Request $request){
      return view('cpga.listarPpcsFinalizados');
    }

    public function ajustes(Request $request){
      $processos = Ppc::where('status', 'processando')->get();
      return view('cpga.listarPpcsAjustes', [
                                            'processos' => $processos,
                                           ]);
    }

    public function acompanharProcesso(Request $request){
      $ppc = Ppc::find($request->idProcesso);
      $curso = $this->api->getPais(6, $ppc->cursoId);
      $nomeCurso = $curso[0]['nome'];
      $nomeUnidade = $curso[2]['nome'];
      $arquivos = Arquivo::where('ppcId', $ppc->id)->orderBy('updated_at', 'desc')->get();
      return view('cpga.acompanharProcesso', [
                                                      'ppc'         => $ppc,
                                                      'arquivos'    => $arquivos,
                                                      'nomeCurso'   => $nomeCurso,
                                                      'nomeUnidade' => $nomeUnidade,
                                                    ]);
    }

    public function novoParecer(Request $request){
      $validatedData = $request->validate([
        'arquivo' => ['file', 'mimes:pdf'],
        'parecer' => ['required'],
      ]);


      $ppc = Ppc::find($request->ppcId);
      if($request->parecer == "Aceito"){
        $status = true;
      }
      if($request->parecer == "Rejeitado"){
        $status = false;
      }

      $file = $request->arquivo;
      $path = $ppc->cursoId . '/' . $ppc->id . '/parecer' . '/' . $request->arquivoId . '/';
      $nome = "cpga.pdf";
      Storage::putFileAs($path, $file, $nome);

      Parecer::create([
        'status'    => $status,
        'tipo'      => 'CPGA',
        'anexo'     => $path . $nome,
        'arquivoId' => $request->arquivoId,
      ]);

      return redirect()->route('cpga.acompanharProcesso', ['idProcesso'=>$ppc->id]);
    }
}
