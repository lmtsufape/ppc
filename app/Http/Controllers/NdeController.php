<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NdeController extends Controller
{
    //
    public function index(){
        return view('nde.home');
        
    }
}
