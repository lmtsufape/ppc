@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center header-ppc">
        <div class="col-sm-4 item-header-ppc">
            
            <h3>PPC'S - Ajustes</h3>
            
        </div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4 item-header-ppc" >
            <div class="input-group">
                <input id="inputBusca" type="text"  class="form-control" placeholder="Buscar Curso, Ano, N° do Processo ou Status">
            </div>
        
        </div>
        
    </div>


    <div class="row justify-content-center">
        <table id="tabela" class="table table-responsive-lg table-hover table-borderless bg-light">
            <thead>
                <th>CURSO</th>
                <th>ANO</th>
                <th>ÚLTIMA ATUALIZAÇÃO</th>
                <th>LOCALIZAÇÃO</th>
                <th>DOWNLOAD</th>
            </thead>

            <tbody>
                
                <tr>
                    <td>Pedagogia</td>
                    <td>2019</td>
                    <td>10/10/2019</td>
                    <td>PREG - CPA</td>
                    <td>
                        <a href="">
                            <img src="{{asset('images/download-solid.svg')}}" style="width:20px">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Ciências da Computação</td>
                    <td>2019</td>
                    <td>19/10/2019</td>
                    <td>NDE</td>
                    <td>
                        <a href="">
                            <img src="{{asset('images/download-solid.svg')}}" style="width:20px">
                        </a>
                    </td>
                </tr>    
                <tr>
                    <td>Letras</td>
                    <td>2019</td>
                    <td>16/10/2019</td>
                    <td>PREG - CGE</td>
                    <td>
                        <a href="">
                            <img src="{{asset('images/download-solid.svg')}}" style="width:20px">
                        </a>
                    </td>
                </tr>

                <tr>
                    <td>Engenharia de Alimentos</td>
                    <td>2019</td>
                    <td>21/10/2019</td>
                    <td>CTA</td>
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