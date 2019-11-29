<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PpcController extends Controller
{
  public function cadastrar(){
      return view('ppc.cadastrar');
  }

  public function criar(Request $request){
    $validator = Validator::make($request->all(), [
      'arquivo' => 'file|mimes:pdf',
    ]);

    if($validator->fails()){
      return redirect()->back()->withErrors($validator->errors());
    }
  }
}
