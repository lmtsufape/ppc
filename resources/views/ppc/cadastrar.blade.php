@extends('layouts.app')

@section('titulo', 'Cadastrar PPC')

@section('content')

<style media="screen">
.card{
  margin-top: 40px;

}
.card-header{
  background-color: #1B2E4F;
  color: white;
  font-size: 20px;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">ABRIR PROCESSOS</div>

                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <label for="">Unidade Acadêmica</label>
                    </div>
                    <div class="col-sm-12">
                      <h3>Garanhuns</h3>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      Curso
                    </div>
                    <div class="col-sm-12">
                        <h3>Ciências da Computação</h3>
                    </div>
                  </div>
                  <form method="POST" action="{{ route("ppc.criar") }}" enctype="multipart/form-data">

                    <div class="row">
                      {{ csrf_field() }}
                      <div class="form-group {{ $errors->has('arquivo') ? ' has-error' : '' }}">
                        <div class="col-sm-12">
                          <label for="arquivo" class="control-label">Anexo</label>
                        </div>
                        <div class="col-sm-12">
                          <input id="arquivo" type="file" class="" name="arquivo" data-placeholder="Nenhum arquivo" data-text="Selecionar" data-btnClass="btn btn-primary-ppc">

                          @if ($errors->has('arquivo'))
                            <span class="help-block">
                              <strong>{{ $errors->first('arquivo') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="row justify-content-center">
                      <button type="submit" class="btn btn-ppc-processo">
                        FINALIZAR
                      </button>
                    </div>
                  </form>

                </div>

            </div>
        </div>
    </div>
</div>


<script src="{{ asset('js/bootstrap-filestyle.min.js')}}"> </script>

@endsection
