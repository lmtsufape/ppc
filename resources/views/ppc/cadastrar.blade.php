@extends('layouts.app')

@section('titulo', 'Cadastrar PPC')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ABRIR PROCESSOS</div>

                <div class="card-body">

                  <strong>UNIDADE ACADÊMICA:</strong> Garanhuns
                  <br>
                  <strong>CURSO:</strong> Ciência da Computação

                  <div class="col-md-8 col-md-offset-2">
                    <form method="POST" action="{{ route("ppc.criar") }}" enctype="multipart/form-data" id="formCadastro">

                      {{ csrf_field() }}

                      <div class="form-group{{ $errors->has('arquivo') ? ' has-error' : '' }}">
                        <label for="arquivo" class="col-md-12 control-label"><strong>ANEXO:</strong></label>

                        <div class="col-md-12">
                          <input id="arquivo" type="file" class="filestyle" name="arquivo" data-placeholder="Nenhum arquivo selecionado" data-text="Selecionar" data-btnClass="btn btn-primary">

                          @error('arquivo')
                          <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>

                      <button onclick="event.preventDefault();confirmar();" id="buttonFinalizar" class="btn btn-primary">
                        FINALIZAR
                      </button>
                    </form>
                  </div>
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
