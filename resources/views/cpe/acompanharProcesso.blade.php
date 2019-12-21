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
                
                @for ($i = 0; $i < 5; $i++)
                    {{-- 1 --}}
                    <div class="card">
                        <div class="card-header" id="heading{{$i}}">
                                <div class="col-sm-12">
                                    <a data-toggle="collapse" href="#collapseProcesso{{$i}}" 
                                    role="button" aria-expanded="false" aria-controls="collapseProcesso{{$i}}">
                                        <img id="img" style="float:left" class="icone-processo" src="{{asset('images/plus-solid.svg')}}" alt="">
                                    </a>
                                    Data: 13/10/2019 (<a href="#">Baixar Versão</a>)
                                </div>
                        </div><!-- end card-header-->
                        <div id="collapseProcesso{{$i}}" class="collapse" aria-labelledby="heading{{$i}}" data-parent="#accordion">
                            <div class="card-body">
                                <form action="">
                                    <div class="form-check">
                                        <label class="form-check-label" for="defaultCheck1">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                            Parecer CPA (<a href="#">Visualizar</a>)
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Adicionar Arquivo</button>
                                            
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="defaultCheck1">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                            Parecer CPE (<a href="#">Visualizar</a>)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="defaultCheck1">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                            Parecer CGE (<a href="#">Visualizar</a>)
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </div><!-- end colapse1-->
                    </div><!-- end card-->
                @endfor
                
                {{-- Modal --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                {{-- Escolher arquivo --}}
                                <div class="input-group">
                                    
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="inputGroupFile01">Carregar Arquivo</label>
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" lang="pt">
                                    </div>
                                </div>
                                
                                <label style="margin-top:20px"><h4>Parecer CPA</h4></label>
                                <div class="form-check">
                                    <input style="" class="" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">Aceito</div>
                                <div class="form-check">
                                    <input style="" class="" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">Enviar para revisão</label>
                                </div>
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Confirmar</button>
                        </div>
                        </div>
                    </div>
                </div>
                
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