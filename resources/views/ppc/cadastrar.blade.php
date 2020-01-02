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
                <div class="card-header">NOVO PPC</div>

                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <label for="">Unidade Acadêmica</label>
                    </div>
                    <div class="col-sm-12">
                      <h3>{{$nomeUnidade}}</h3>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      Curso
                    </div>
                    <div class="col-sm-12">
                        <h3>{{$nomeCurso}}</h3>
                    </div>
                  </div>
                  <form method="POST" action="{{ route("ppc.criar") }}" enctype="multipart/form-data" id="formCadastro">
                    <div class="row">
                      {{ csrf_field() }}
                      <div class="col-sm-12">

                        <div class="form-group {{ $errors->has('arquivo') ? ' has-error' : '' }}">
                          
                            <label for="arquivo" class="control-label">Anexo</label>
                            <div class="custom-file">
                              <input type="file" class="filestyle" data-placeholder="Nenhum arquivo" data-text="Selecionar" data-btnClass="btn-primary-lmts" name="arquivo">
                              @error('arquivo')
                              <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                              <small id="emailHelp" class="form-text text-muted">O arquivo deve ser menor do que 6mb.</small>
                            </div>
                          
                        </div>
                      </div>
                    </div>

                    <div class="row justify-content-center">

                      <button onclick="event.preventDefault();confirmar();" id="buttonFinalizar" class="btn btn-ppc-processo-small">
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


<script type="text/javascript" >
function confirmar(){
if(confirm("Tem certeza que deseja finalizar?") == true) {
  document.getElementById("formCadastro").submit();
}
}

</script>

@endsection
