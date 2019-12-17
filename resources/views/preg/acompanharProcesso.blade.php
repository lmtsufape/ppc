@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
    {{-- Título do processo --}}
        <div class="titulo-tabela-lmts">
            <h2>ACOMPANHAR PROCESSOS</h2>
        </div>
    </div>
    {{-- Informações do processo --}}
    <div class="row info-processo">    
        <div class="col-sm-3">
            Curso
            <h3>Pedagogia</h3>
        </div>
        <div class="col-sm-3">
            Unidade Acadêmica
            <h3>Garanhuns</h3>
        </div>
        <div class="col-sm-3">
            N° do Processo
            <h3>201912123</h3>
        </div>
        <div class="col-sm-3">
            Status
            <h3>Finalizado </h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12">

            <div class="accordion" id="accordion">
                
                @for ($i = 0; $i < 5; $i++)
                    {{-- 1 --}}
                    <div class="card">
                        <div class="card-header" id="heading{{$i}}">
                                <div class="col-sm-12">
                                    <a data-toggle="collapse" href="#collapseProcesso{{$i}}" 
                                    role="button" aria-expanded="false" aria-controls="collapseProcesso{{$i}}">
                                        <img style="float:left" class="icone-processo" src="{{asset('images/info-circle-solid.svg')}}" alt="">
                                    </a>
                                    <h3>Data: 13/10/2019 (<a href="#">Baixar Versão</a>)</h3>
                                </div>
                        </div><!-- end card-header-->
                        <div id="collapseProcesso{{$i}}" class="collapse" aria-labelledby="heading{{$i}}" data-parent="#accordion">
                            <div class="card-body">
                                <form action="">
                                    <div class="form-check">
                                        <input style="" class="" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            <h4>Parecer CPA (<a href="#">Visualizar</a>)</h4>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input style="" class="" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            <h4>Parecer CPE (<a href="#">Visualizar</a>)</h4>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input style="" class="" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            <h4>Parecer CGE (<a href="#">Visualizar</a>)</h4>
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </div><!-- end colapse1-->
                    </div><!-- end card-->
                @endfor
                
                
                
            </div>
        </div>
    </div>
</div>

    
@endsection