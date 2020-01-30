@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center header-ppc">
        <div class="col-sm-4 item-header-ppc">
            
            <h3>PPC's - FINALIZADOS</h3>
            
        </div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4 item-header-ppc" >
            <div class="input-group">
                <input id="inputBusca" type="text"  class="form-control" placeholder="Buscar por Data ou Status do Processo">
            </div>
        
        </div>
        
    </div>


    <div class="row justify-content-center">
        <table id="tabela" class="table table-responsive-lg table-hover table-borderless bg-light">
            <thead>
                <th>CURSO</th>
                <th>ANO</th>
                <th>N° DO PROCESSO</th>
                <th>STATUS</th>
                <th>DOWNLOAD</th>
            </thead>

            <tbody>
                
                <tr>
                    <td>Pedagogia</td>
                    <td>2019</td>
                    <td>201912132</td>
                    <td>Disponível</td>
                    <td>
                        <a href="">
                            <img src="{{asset('images/download-solid.svg')}}" style="width:20px">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Ciências da Computação</td>
                    <td>2019</td>
                    <td>201912564</td>
                    <td>Disponível</td>
                    <td>
                        <a href="">
                            <img src="{{asset('images/download-solid.svg')}}" style="width:20px">
                        </a>
                    </td>
                </tr>    
                <tr>
                    <td>Letras</td>
                    <td>2019</td>
                    <td>201912142</td>
                    <td>Disponível</td>
                    <td>
                        <a href="">
                            <img src="{{asset('images/download-solid.svg')}}" style="width:20px">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Engenharia de Pesca</td>
                    <td>2019</td>
                    <td>201912133</td>
                    <td>Disponível</td>
                    <td>
                        <a href="">
                            <img src="{{asset('images/download-solid.svg')}}" style="width:20px">
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
    

</div>


<script>

    // Usa a biblioteca quicksearch para buscar dados na tabela
    $('input#inputBusca').quicksearch('table#tabela tbody tr');

</script>
@endsection