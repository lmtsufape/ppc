@extends('layouts.app')
@section('content')

{{-- Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Parecer</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('cge.novoParecer') }}" enctype="multipart/form-data" id="formErrata">
              <input type="hidden" value="" name="arquivoId" id="arquivoId">
              <input type="hidden" value="{{$ppc->id}}" name="ppcId">
              @csrf
                {{-- Escolher arquivo --}}
                <div class="input-group">

                    <div class="custom-file">
                        <label class="custom-file-label" for="inputGroupFile01">Carregar Arquivo</label>
                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" lang="pt" name="arquivo">
                        <small id="emailHelp" class="form-text text-muted">Selecionar arquivo PDF menor do que 6mb.</small>
                    </div>
                </div>
                <small id="emailHelp" class="form-text text-muted">Selecionar arquivo PDF menor do que 6mb.</small>

                <label style="margin-top:20px"><h4>Parecer CPA</h4></label>
                @error('parecer')
                  <a style="color: red">Selecione um parecer.</a>
                @enderror
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="parecer" id="inlineRadio1" value="Aceito">
                    <label class="form-check-label" for="defaultCheck1">Aceito</div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="parecer" id="inlineRadio2" value="Rejeitado">
                    <label class="form-check-label" for="defaultCheck1">Enviar para revisão</label>
                </div>

            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button onclick="event.preventDefault();confirmarErrata();" type="button" class="btn btn-primary">Confirmar</button>
        </div>
        </div>
    </div>
</div>

{{-- Modal 2 --}}
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModal1Label">Parecer</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('cge.modificarArquivo') }}" enctype="multipart/form-data" id="formErrata1">
              <input type="hidden" value="" name="arquivoId" id="arquivoId1">
              <input type="hidden" value="{{$ppc->id}}" name="ppcId">
              @csrf
                {{-- Escolher arquivo --}}
                <div class="input-group">

                    <div class="custom-file">
                        <label class="custom-file-label" for="inputGroupFile02">Carregar Arquivo</label>
                        <input type="file" class="custom-file-input" id="inputGroupFile02" aria-describedby="inputGroupFileAddon01" lang="pt" name="arquivo">
                        <small id="emailHelp1" class="form-text text-muted">Selecionar arquivo PDF menor do que 6mb.</small>
                    </div>
                </div>
                <small id="emailHelp1" class="form-text text-muted">Selecionar arquivo PDF menor do que 6mb.</small>


            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button onclick="event.preventDefault();confirmarNovoArquivo();" type="button" class="btn btn-primary">Confirmar</button>
        </div>
        </div>
    </div>
</div>


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
                    {{-- 1 --}}
                    <div class="card">
                        <div class="card-header" id="heading{{$i}}">
                                <div class="col-sm-12">
                                    <a data-toggle="collapse" href="#collapseProcesso{{$i}}"
                                    role="button" aria-expanded="false" aria-controls="collapseProcesso{{$i}}">
                                        <img id="img" style="float:left" class="icone-processo img" src="{{asset('images/plus-solid.svg')}}" alt="">
                                    </a>
                                    <?php
                                      $date = date_create($arquivo->created_at);
                                      $date = date_format($date, 'd/m/Y');
                                    ?>

                                    Data: {{$date}} (<a href="{{ route('download', ['file' => $arquivo->anexo])}}">Baixar Versão</a>)
                                </div>
                        </div><!-- end card-header-->
                        <div id="collapseProcesso{{$i}}" class="collapse" aria-labelledby="heading{{$i}}" data-parent="#accordion">
                            <div class="card-body">
                                <form action="">
                                    <div class="form-check">
                                      @if($arquivo->parecer)
                                        @foreach($arquivo->parecer as $parecer)
                                          @if($parecer->tipo == 'CPGA')
                                            @if($parecer->status == true)
                                              <a>
                                                <img class="icone-eye" src="{{asset('images/check-solid.svg')}}" alt="">
                                              </a>
                                            @endif
                                            @if($parecer->status == false)
                                              <a>
                                                <img class="icone-eye" src="{{asset('images/times-solid.svg')}}" alt="">
                                              </a>
                                            @endif
                                            <label class="form-check-label" for="defaultCheck1">
                                                Parecer CPGA
                                                <a href="{{ route('download', ['file' => $parecer->anexo])}}">
                                                    <img class="icone-eye" src="{{asset('images/eye-solid.svg')}}" alt="">
                                                </a>

                                            </label>
                                          @endif
                                        @endforeach
                                      @else
                                        <input style="" class="" type="radio" value="" name="inlineRadioOptions" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Parecer CPGA
                                            <a href="{{ route('download', ['file' => $parecer->anexo])}}">
                                                <img class="icone-eye" src="{{asset('images/eye-solid.svg')}}" alt="">
                                            </a>

                                        </label>
                                      @endif
                                    </div>
                                    <div class="form-check">
                                      @if($arquivo->parecer)
                                        @foreach($arquivo->parecer as $parecer)
                                          @if($parecer->tipo == 'CAPR')
                                            @if($parecer->status == true)
                                              <a>
                                                <img class="icone-eye" src="{{asset('images/check-solid.svg')}}" alt="">
                                              </a>
                                            @endif
                                            @if($parecer->status == false)
                                              <a>
                                                <img class="icone-eye" src="{{asset('images/times-solid.svg')}}" alt="">
                                              </a>
                                            @endif
                                            <label class="form-check-label" for="defaultCheck1">
                                                Parecer CAPR
                                                <a href="{{ route('download', ['file' => $parecer->anexo])}}">
                                                    <img class="icone-eye" src="{{asset('images/eye-solid.svg')}}" alt="">
                                                </a>

                                            </label>
                                          @endif
                                        @endforeach
                                      @else
                                        <input style="" class="" type="radio" value="" name="inlineRadioOptions" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Parecer CAPR
                                            <a href="{{ route('download', ['file' => $parecer->anexo])}}">
                                                <img class="icone-eye" src="{{asset('images/eye-solid.svg')}}" alt="">
                                            </a>

                                        </label>
                                      @endif
                                    </div>
                                    <div class="form-check">
                                      <?php $flagParecer = false; ?>
                                      @if($arquivo->parecer)
                                        @foreach($arquivo->parecer as $parecer)
                                          @if($parecer->tipo == 'CGE')
                                            <?php $flagParecer = true; ?>
                                            @if($parecer->status == true)
                                              <a>
                                                <img class="icone-eye" src="{{asset('images/check-solid.svg')}}" alt="">
                                              </a>

                                            @endif
                                            @if($parecer->status == false)
                                              <a>
                                                <img class="icone-eye" src="{{asset('images/times-solid.svg')}}" alt="">
                                              </a>

                                            @endif
                                            <label class="form-check-label" for="defaultCheck1">
                                                Parecer CGE
                                                <a href="{{ route('download', ['file' => $parecer->anexo])}}">
                                                    <img class="icone-eye" src="{{asset('images/eye-solid.svg')}}" alt="">
                                                </a>
                                                <button type="button" class="btn btn-primary" onclick="mudarArquivoId1({{$arquivo->id}})" data-toggle="modal" data-target="#exampleModal1">Modificar Arquivo</button>

                                            </label>
                                          @endif
                                        @endforeach
                                      @endif
                                      @if($flagParecer == false)
                                        <label class="form-check-label" for="defaultCheck1">
                                            Parecer CGE
                                        </label>
                                        <button type="button" class="btn btn-primary" onclick="mudarArquivoId({{$arquivo->id}})" data-toggle="modal" data-target="#exampleModal">Adicionar Arquivo</button>
                                      @endif
                                    </div>
                                </form>
                            </div>
                        </div><!-- end colapse1-->
                    </div><!-- end card-->

              @endforeach



            </div>
        </div>
    </div>
</div>


<script>

    function mudarArquivoId(x){
      document.getElementById("arquivoId").value = x;
    }

    function mudarArquivoId1(x){
      document.getElementById("arquivoId1").value = x;
    }

    function confirmarErrata(){
      if(confirm("Tem certeza que deseja finalizar?") == true) {
        document.getElementById("formErrata").submit();
      }
    }

    function confirmarNovoArquivo(){
      if(confirm("Tem certeza que deseja finalizar?") == true) {
        document.getElementById("formErrata1").submit();
      }
    }

    $(document).ready(function(){
        $('.img').click(function(){
            if($(this).attr("src") == "{{asset('images/plus-solid.svg')}}"){

                $(this).attr("src", "{{asset('images/minus-solid.svg')}}" );
            }else{
                $(this).attr("src", "{{asset('images/plus-solid.svg')}}" );
            }
        });

    });
</script>

@endsection
