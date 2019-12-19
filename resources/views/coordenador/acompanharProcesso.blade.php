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
            <h3>{{$nomeCurso}}</h3>
        </div>
        <div class="col-sm-3">
            Unidade Acadêmica
            <h3>{{$nomeUnidade}}</h3>
        </div>
        <div class="col-sm-3">
            N° do Processo
            <h3>{{$ppc->id}}</h3>
        </div>
        <div class="col-sm-3">
            Status
            <h3>{{$ppc->status}} </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">

            <div class="accordion" id="accordion">
                <?php $i = 0; ?>
                @foreach($arquivos as $arquivo)
                    <?php $i++; ?>
                    <div class="card">
                        <div class="card-header" id="heading{{$i}}">
                                <div class="col-sm-12">
                                    <a data-toggle="collapse" href="#collapseProcesso{{$i}}"
                                    role="button" aria-expanded="false" aria-controls="collapseProcesso{{$i}}">
                                        <img style="float:left" class="icone-processo" src="{{asset('images/info-circle-solid.svg')}}" alt="">
                                    </a>
                                    <?php
                                      $date = date_create($arquivo->update_at);
                                      $date = date_format($date, 'd/m/Y');
                                    ?>

                                    {{ $date }}
                                    <h3>Data: {{$date}} (<a href="#">Baixar Versão</a>)</h3>
                                </div>
                        </div><!-- end card-header-->
                        <div id="collapseProcesso{{$i}}" class="collapse" aria-labelledby="heading{{$i}}" data-parent="#accordion">
                            <div class="card-body">
                                <form action="">
                                    <div class="form-check">
                                        <input style="" class="" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            <h4>Parecer CPA (<a href="#">Visualizar</a>)
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Adicionar Arquivo</button>
                                            </h4>
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
                @endforeach

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



@endsection
