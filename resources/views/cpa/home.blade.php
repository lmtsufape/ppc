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
          <a href="{{route('cpa.ajustes')}}">
            <div class="card-ppc-body">
              <img class="icone" src="{{asset('images/edit-solid.svg')}}" >
              
            </div>
            <div class="card-ppc-header" ><h3>DISPONÍVEL PARA<br>AJUSTES</h3></div>
            </a>
          </div><!-- end card-->
      </div>

      <div class="col-sm-4">
          <div class="card-ppc" >
            <a href="{{route('cpa.finalizados')}}">
              <div class="card-ppc-body">
                <img class="icone" src="{{asset('images/download-solid.svg')}}"  >
                
              </div>
              <div class="card-ppc-header"><h3>DISPONÍVEL PARA<br>DOWNLOAD</h3></div>
          </a>
          </div><!-- end card-->
      </div>

  </div>

  

</div>
@endsection
