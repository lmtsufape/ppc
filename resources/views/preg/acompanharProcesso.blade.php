@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
    {{-- Título do processo --}}
        <div class="titulo-tabela-lmts">
            <h2>ACOMPANHAR PPC</h2>
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
                
                
                    {{-- 1 --}}
                    <div class="card">
                        <div class="card-header" id="heading1">
                                <div class="col-sm-12">
                                    <a data-toggle="collapse" href="#collapseProcesso1" 
                                    role="button" aria-expanded="false" aria-controls="collapseProcesso1">
                                        <img id="img" style="float:left" class="icone-processo" src="{{asset('images/plus-solid.svg')}}" alt="">
                                    </a>
                                    Data: 13/10/2019 (<a href="#">Baixar Versão</a>)
                                </div>
                        </div><!-- end card-header-->
                        <div id="collapseProcesso1" class="collapse" aria-labelledby="heading1" data-parent="#accordion">
                            <div class="card-body">
                                <form action="">
                                    <div class="form-check">
                                        <input style="" class="" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Parecer CPA (<a href="#">Visualizar</a>)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input style="" class="" type="checkbox" value="" id="defaultCheck2">
                                        <label class="form-check-label" for="defaultCheck2">
                                            Parecer CPE (<a href="#">Visualizar</a>)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input style="" class="" type="checkbox" value="" id="defaultCheck3">
                                        <label class="form-check-label" for="defaultCheck3">
                                            Parecer CGE (<a href="#">Visualizar</a>)
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </div><!-- end colapse1-->
                    </div><!-- end card-->
                
                
                
                
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#img').click(function(){
            if($(this).attr("src") == "{{asset('images/plus-solid.svg')}}"){
                
                $(this).attr("src", "{{asset('images/minus-solid.svg')}}" );
            }else{
                $(this).attr("src", "{{asset('images/plus-solid.svg')}}" );
            }
        });

    });
</script>
    
@endsection