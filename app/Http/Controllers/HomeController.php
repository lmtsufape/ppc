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
        return view('home');
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
}