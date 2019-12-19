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
  <form method="POST" action="{{ route("ppc.criar") }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">ABRIR PROCESSOS</div>

                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <label for="">Status</label>
                    </div>
                    <div class="col-sm-12">
                      <h3>Em Análise</h3>
                    </div>
                  </div>
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


                    <div class="row">
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
                      <button type="button" class="btn btn-ppc-processo" data-toggle="modal" data-target="#exampleModal">
                        SOLICITAR AJUSTES
                      </button>
                    </div>


                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Selecione a opção abaixo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="ccd">
                <label class="form-check-label" for="ccd">
                  CCD
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="cta">
                <label class="form-check-label" for="cta">
                  CTA
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="preg" style="martin-top:20px;">
                <label class="form-check-label" for="preg">
                  PREG
                </label>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Send message</button>
          </div>
        </div>
      </div>
    </div>

</form>
</div>
<script type="text/javascript">

</script>

<script src="{{ asset('js/bootstrap-filestyle.min.js')}}"> </script>

@endsection
