@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center header-ppc">
        <div class="col-sm-8 item-header-ppc">

            <h3>PPC's - FINALIZADOS</h3>

        </div>
        <div class="col-sm-4 item-header-ppc" >
            <div class="input-group">
                <input id="inputBusca" type="text"  class="form-control" placeholder="Buscar por Data">
            </div>

        </div>

    </div>


    <div class="row justify-content-center">
        <table id="tabela" class="table table-responsive-lg table-hover table-borderless bg-light">
            <thead align="center">
                <th>ÚLTIMA ATUALIZAÇÃO</th>
                <th>VISUALIZAR</th>
                <th>DOWNLOAD</th>
                <th>RETOMAR</th>
            </thead>

            <tbody>
              @foreach($processos as $processo)
                <tr align="center">
                  <td>

                    <?php
                    $date = date_create($processo->update_at);
                    // dd($processo->updated_at);
                    // dd($date);
                    $date = date_format($date, 'd/m/Y H:i:s');
                    ?>

                    {{ $date }}

                  </td>

                  <td>
                    <a href="{{ route('capr.acompanharProcesso', ['idProcesso' => $processo->id]) }}">
                      <img class="icone-eye" src="{{asset('images/eye-solid.svg')}}" alt="">
                    </a>
                  </td>
                  <td>
                    <div class="input-group">

                      <select class="custom-select" style="width:50px" required>
                        <option value="" desabled selected>Selecionar Versão</option>
                        @foreach($processo->arquivo as $key)
                          <?php
                          $date = date_create($key->created_at);
                          $date = date_format($date, 'd/m/Y H:i:s');
                          ?>
                          <option onclick="versaoDownload('{{$key->anexo}}');" >{{$date}}</option>
                        @endforeach

                      </select>
                      <div class="input-group-append">
                        <a href="{{ route('download')}}">
                          <button onclick="event.preventDefault(); document.getElementById('versaoForm').submit();" class="btn btn-outline-secondary" type="button">
                              <img src="{{asset('images/download-solid.svg')}}" style="width:20px">
                          </button>
                        </a>
                      </div>
                    </div>
                  </td>
                  <td>
                    <a href="{{ route('coordenador.retomar', ['idProcesso' => $processo->id]) }}">
                      Retomar
                    </a>
                  </td>
                </tr>
              @endforeach
              <form id="versaoForm" action="{{ route('download') }}" method="GET" target="_new" style="display: none;">
                <input type="hidden" value="" name="file" id="versaoString">
              </form>

            </tbody>
        </table>

    </div>


</div>


<script>
    function versaoDownload(x){
      document.getElementById('versaoString').value = x;
    }
    // Usa a biblioteca quicksearch para buscar dados na tabela
    $('input#inputBusca').quicksearch('table#tabela tbody tr');

</script>
@endsection
