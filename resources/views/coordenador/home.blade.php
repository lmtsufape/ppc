@extends('layouts.app')

@section('titulo', 'Home')

@section('content')

<style>

</style>

<div class="container">

  <div class="row justify-content-center">
    <div class="col-sm-12">

      <div class="titulo-tabela-lmts">
        <h2>PPCs</h2>
      </div>

    </div>

  </div>

  <div class="row justify-content-center ">

      <div class="col-sm-4">
        <div class="card-ppc" >
          <a id="link-card" href="{{ route('coordenador.verAbertos') }}">
            <div class="card-ppc-body">
              <img class="icone" src="{{asset('images/folder-open-solid.svg')}}" >
            </div>
            <div class="card-ppc-header" ><h3>PPCs<br>ABERTOS</h3></div>
          </a>
        </div><!-- end card-->
      </div>

      <div class="col-sm-4">
          <div class="card-ppc" >
            <a id="link-card" href="{{ route('ppc.cadastrar') }}">
              <div class="card-ppc-body">
                <img class="icone" src="{{asset('images/new_file.png')}}" >
              </div>
              <div class="card-ppc-header" ><h3>NOVO<br>PPC</h3></div>
            </a>
          </div><!-- end card-->
      </div>

      <div class="col-sm-4">
          <div class="card-ppc" >
          <a id="link-card" href="{{route('coordenador.verFinalizados')}}">
              <div class="card-ppc-body">
                <img class="icone-retomar" src="{{asset('images/retomar-file-regular.svg')}}" >
              </div>
              <div class="card-ppc-header"><h3>RETOMAR<br>PPC</h3></div>
          </a>
          </div><!-- end card-->
      </div>

  </div>

  {{-- <div class="row justify-content-center">
    <a id="white" class="btn btn-ppc-processo" href="{{ route('coordenador.verProcessos') }}">
      PPCs ABERTOS
    </a>

  </div> --}}

</div>
@endsection
