<?php

namespace App\Http\Controllers;

use Lmts\src\controller\LmtsApi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $api;
    public function __construct()
    {
        // $this->middleware('auth');
        $this->api = new LmtsApi();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(session('tipoNome') == 'PREG'){
          return redirect()->route('preg.home');
        }
        if(session('tipoNome') == 'CGE'){
          return redirect()->route('cge.home');
        }
        if(session('tipoNome') == 'CPGA'){
          return redirect()->route('cpga.home');
        }
        if(session('tipoNome') == 'CAPR'){
          return redirect()->route('capr.home');
        }
        if(session('tipoNome') == 'coordenador'){
          return redirect()->route('coordenador.home');
        }
        return view('login');
    }

    public function loginApi(Request $request){
      $logado = $this->api->login($request->email, $request->password);
      if($logado){
        return redirect()->route('home');
      }
      else{
        return redirect()->route('login')->withInput(['email' => $request->email])
                                         ->withErrors(['email' => 'E-mail ou Senha incorreta.']);
      }
    }

    public function irParaLogin(Request $request){
  		if($this->api->check()){
  			return redirect()->route('home');
  		}

  		return view('auth.login');
  	}

    public function downloadArquivo(Request $request){
      return response()->download(storage_path('app/'.$request->file));
  	}
}
