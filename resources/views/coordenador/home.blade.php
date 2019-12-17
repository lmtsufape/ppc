@extends('layouts.app')

@section('titulo', 'Home')

@section('content')
<div class="container">

  <div class="row justify-content-center">
    <div class="col-sm-12">

      <div class="titulo-tabela-lmts">
        <h2>PROCESSOS</h2>
      </div>

    </div>

  </div>

  <div class="row justify-content-center">
      <div class="col-sm-4">
          <div class="card-ppc" >
            <a href="{{ route('ppc.cadastrar') }}">
            <div class="card-ppc-header" ><h3>NOVO<br>PROCESSO</h3></div>
            <div class="card-ppc-body">
              <img src="{{asset('images/new_file.png')}}" >
            </div>
            </a>
          </div><!-- end card-->
      </div>

      <div class="col-sm-4">
          <div class="card-ppc" >
            <a href="#">
            <div class="card-ppc-header"><h4>RETOMAR<br>PROCESSO</h4></div>
            <div class="card-ppc-body">
              <img src="{{asset('images/folder.png')}}" >
            </div>
          </a>
          </div><!-- end card-->
      </div>

  </div>

  <div class="row justify-content-center">
    <a class="btn btn-ppc-processo" href="#">
      PROCESSOS ABERTOS
    </a>

  </div>

</div>
@endsection
