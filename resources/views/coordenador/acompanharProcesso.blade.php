@extends('layouts.app')
@section('content')

{{-- Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" action="{{ route('coordenador.novaVersao') }}" enctype="multipart/form-data" id="formErrata">
    @csrf
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Enviar nova versão</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group {{ $errors->has('arquivo') ? ' has-error' : '' }}">

                  <label for="arquivo" class="control-label">Anexo</label>
                  <div class="custom-file">
                    <input type="hidden" name="idProcesso" value="{{$ppc->id}}">
                    <input type="file" class="filestyle" data-placeholder="Nenhum arquivo" data-text="Selecionar" data-btnClass="btn-primary-lmts" name="arquivo">
                    @error('arquivo')
                    <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <small class="form-text text-muted">Selecionar arquivo PDF menor do que 6mb.</small>
                  </div>

              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button onclick="event.preventDefault();confirmarErrata();" type="button" class="btn btn-primary">Enviar</button>
        </div>
      </div>
    </div>
  </form>
</div>

<div class="container">
    <div class="row justify-content-center">
    {{-- Título do processo --}}

        <div class="titulo-tabela-lmts">
            <div class="row">
                <div class="col-sm-9">
                    <h2>ACOMPANHAR PPC</h2>
                </div>
                <div class="col-sm-3">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Adicionar Arquivo</button>
                    <!-- <a id="btn-nova-versao" href="{{ route('coordenador.novaVersao', ['idProcesso' => $ppc->id]) }}" class="btn btn-primary">Nova Versão</a> -->
                </div>
            </div>
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
                                        <img id="img" style="float:left" class="icone-processo" src="{{asset('images/plus-solid.svg')}}" alt="">
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
                                          @if($parecer->tipo == 'CPA')
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
                                                Parecer CPA
                                                <a href="{{ route('download', ['file' => $parecer->anexo])}}">
                                                    <img class="icone-eye" src="{{asset('images/eye-solid.svg')}}" alt="">
                                                </a>

                                            </label>
                                          @endif
                                        @endforeach
                                      @else

                                        <input style="" class="" type="radio" value="" name="inlineRadioOptions" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Parecer CPA
                                            <a href="{{ route('download', ['file' => $parecer->anexo])}}">
                                                <img class="icone-eye" src="{{asset('images/eye-solid.svg')}}" alt="">
                                            </a>

                                        </label>
                                      @endif
                                    </div>
                                    <div class="form-check">
                                      @if($arquivo->parecer)
                                        @foreach($arquivo->parecer as $parecer)
                                          @if($parecer->tipo == 'CPE')
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
                                                Parecer CPE
                                                <a href="{{ route('download', ['file' => $parecer->anexo])}}">
                                                    <img class="icone-eye" src="{{asset('images/eye-solid.svg')}}" alt="">
                                                </a>

                                            </label>
                                          @endif
                                        @endforeach
                                      @else
                                        <input style="" class="" type="radio" value="" name="inlineRadioOptions" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Parecer CPE
                                            <a href="{{ route('download', ['file' => $parecer->anexo])}}">
                                                <img class="icone-eye" src="{{asset('images/eye-solid.svg')}}" alt="">
                                            </a>

                                        </label>
                                      @endif
                                    </div>
                                    <div class="form-check">
                                      @if($arquivo->parecer)
                                        @foreach($arquivo->parecer as $parecer)
                                          @if($parecer->tipo == 'CGE')
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

                                            </label>
                                          @endif
                                        @endforeach
                                      @else
                                        <input style="" class="" type="radio" value="" name="inlineRadioOptions" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Parecer CGE
                                            <a href="{{ route('download', ['file' => $parecer->anexo])}}">
                                                <img class="icone-eye" src="{{asset('images/eye-solid.svg')}}" alt="">
                                            </a>

                                        </label>
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
    $(document).ready(function(){
        $('#img').click(function(){
            if($(this).attr("src") == "{{asset('images/plus-solid.svg')}}"){

                $(this).attr("src", "{{asset('images/minus-solid.svg')}}" );
            }else{
                $(this).attr("src", "{{asset('images/plus-solid.svg')}}" );
            }
        });

    });
    function confirmarErrata(){
      if(confirm("Tem certeza que deseja finalizar?") == true) {
        document.getElementById("formErrata").submit();
      }
    }

</script>


@endsection
