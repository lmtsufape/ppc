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
                <div class="card-header">REABRIR PPC</div>

                <div class="card-body">

                  <form method="POST" action="{{ route("ppc.criar") }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">
                      <div class="col-sm-12">
                        <label for="buscar" class="control-label">N° do processo</label>
                        <input id="buscar" class="form-control form-control-lg" type="text" placeholder="N° do processo">
                      </div>
                    </div>


                    <div class="row justify-content-center">
                      <button type="submit" class="btn btn-ppc-processo">
                        BUSCAR
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
