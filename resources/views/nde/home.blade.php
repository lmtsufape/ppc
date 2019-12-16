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
          <a href="{{route('preg.ajustes')}}">
            <div class="card-ppc-header" ><h3>NOVO<br>PROCESSO</h3></div>
            <div class="card-ppc-body">
              <img class="icone" src="{{asset('images/file-regular.svg')}}" style="height:80px" >
              
            </div>
            </a>
          </div><!-- end card-->
      </div>

      <div class="col-sm-4">
          <div class="card-ppc" >
            <a href="{{route('preg.finalizados')}}">
            <div class="card-ppc-header"><h3>RETOMAR<br>PROCESSO</h3></div>
            <div class="card-ppc-body">
              <img class="icone" src="{{asset('images/folder-regular.svg')}}"  >
              
            </div>
          </a>
          </div><!-- end card-->
      </div>

  </div>

  

</div>
@endsection
