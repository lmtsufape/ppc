@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center header-ppc">
        <div class="col-sm-4 item-header-ppc">
            
            <h3>PPCs Finalizados</h3>
            
        </div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4 item-header-ppc" >
            <div class="input-group">
                <input id="inputBusca" type="text"  class="form-control" placeholder="Buscar PPC">
                {{-- <div class="busca" id="busca" style="background-color:aqua">
                    <img class="icone-busca" src="{{asset('images/search-solid.svg')}}">
                </div> --}}
            </div>
        
        </div>
        
    </div>


    <div class="row justify-content-center">
        <table id="tabela" class="table table-hover table-borderless bg-light">
            <thead>
                <th scope="col">CURSO</th>
                <th scope="col">ANO</th>
                <th scope="col">N° DO PROCESSO</th>
                <th scope="col">STATUS</th>
                <th scope="col">DOWNLOAD</th>
            </thead>

            <tbody id="tbody">
                
                <tr>
                    <td>Ciências da Computação</td>
                    <td>01/10/2019</td>
                    <td>0001</td>
                    <td>Finalizado</td>
                    <td>
                        <a href="">
                            <img src="{{asset('images/download-solid.svg')}}" style="width:20px">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Agronomia</td>
                    <td>01/11/2019</td>
                    <td>0002</td>
                    <td>Finalizado</td>
                    <td>
                        <a href="">
                            <img src="{{asset('images/download-solid.svg')}}" style="width:20px">
                        </a>
                    </td>
                </tr>    
                <tr>
                    <td>Zootecnia</td>
                    <td>01/08/2019</td>
                    <td>0003</td>
                    <td>Em Espera</td>
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